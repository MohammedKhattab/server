<?php

namespace App;

use App\Events\OrderStatusChanged;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Order extends Model
{
    /** @var array */
    public static $statuses = [
        'pending',
        'rejected',
        'waiting-payment',
        'payment-was-made',
        'did-not-pay',
        'shipped',
    ];

    /** @var array */
    public static $statusesColor = [
        'primary',
        'danger',
        'info',
        'warning',
        'danger',
        'success',
    ];

    /** @var array */
    protected $fillable = [
        'is_for_client', 'status',
        'city', 'target_name', 'target_phone', 'target_city',
        'target_references', 'product_type', 'product_price',
        'amount', 'paid_at', 'payment_method'
    ];

    /** @var array */
    protected $dates = [
        'paid_at'
    ];

    /** @var array */
    protected $casts = [
        'is_for_client' => 'boolean',
        'status' => 'integer',
    ];

    /** @var bool */
    public $incrementing = false;

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function(Order $order) {
            $order->{$order->getKeyName()} = sprintf("%06d", mt_rand(1, 999999));
            $order->amount = self::amountFor($order->is_for_client);
        });
    }

    /**
     * Return the actual amount for this order.
     *
     * @param bool $client
     * @return int
     */
    public static function amountFor($client = true)
    {
        return (int) setting(
                'amount.' . ($client ? 'client' : 'customer'),
                0
            ) - (int) setting('amount.discount', 0);
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get HTML formatted title for this order.
     *
     * @return string
     */
    public function getTitleAttribute()
    {
        $from = $this->target_city;
        $to = $this->city;

        if ($this->is_for_client) {
            $from = $this->city;
            $to = $this->target_city;
        }

        $directions = "<span class='px-2 bg-gradient-success text-white py-1 rounded'>{$from} <span class='text-lighter'>⇋</span> {$to}</span>";

        return 'استلام أو تسليم منتج ' . $directions;
    }

    /**
     * Get total amount with product.
     *
     * @return string
     */
    public function getTotalAttribute()
    {
        return $this->amount + $this->product_price;
    }

    /**
     * determine if the order for client or customer, and return the readable results.
     *
     * @return string
     */
    public function getTypeAttribute()
    {
        return $this->is_for_client ? 'client' : 'customer';
    }

    /**
     * Output a HTML's span with badge class.
     *
     * @return string
     */
    public function getStatusBadgeAttribute()
    {
        $color = self::$statusesColor[$this->status];
        $title = trans('orders.fields.status.' . self::$statuses[$this->status]);

        return "<span class='badge badge-{$color}'>{$title}</span>";
    }

    /**
     * Return a formatter number with currency.
     *
     * @param $amount
     * @return string
     */
    public function formatToCurrency($amount) {
        return number_format($amount, 0) . ' ر.س';
    }

    /**
     * return readable amount.
     *
     * @return string
     */
    public function readableAmount()
    {
        return $this->formatToCurrency($this->amount);
    }

    /**
     * return readable total.
     *
     * @return string
     */
    public function readableTotal()
    {
        return $this->formatToCurrency($this->total);
    }

    /**
     * return readable product price.
     *
     * @return string
     */
    public function readableProductPrice()
    {
        return $this->formatToCurrency($this->product_price);
    }

    /**
     * Update the order status and fire an event.
     *
     * @param $status
     */
    public function updateStatusTo($status)
    {
        $this->update([
            'status' => $status,
        ]);

        event(new OrderStatusChanged($this));
    }
}
