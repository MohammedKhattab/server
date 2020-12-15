<?php

namespace App\Notifications\Services;

use Carbon\Carbon;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SMSProvider
{
    /**
     * @var string
     */
    private string $username;

    /**
     * @var string
     */
    private string $password;

    /**
     * @var string
     */
    private string $sender;

    /**
     * @var string
     */
    protected string $recipient;

    /**
     * @var string
     */
    protected string $message = '';

    /**
     * @var array
     */
    protected array $variables = [];

    /**
     * @var Carbon|null $date
     */
    protected ?Carbon $date = null;

    public function __construct()
    {
        $this->credentials(
            setting('sms.username'),
            setting('sms.sender'),
            setting('sms.password'),
        );
    }

    /**
     * Set provider's username and password.
     *
     * @param string $username
     * @param string $sender
     * @param string $password
     * @return SMSProvider
     */
    protected function credentials($username, $sender, $password): SMSProvider
    {
        $this->username = $username;
        $this->sender = $sender;
        $this->password = $password;

        return $this;
    }

    /**
     * Set recipient's phone number.
     *
     * @param $phone
     * @return SMSProvider
     */
    public function phone($phone): SMSProvider
    {
        $this->recipient = $phone;

        return $this;
    }

    /**
     * @param array $variables
     * @return $this
     */
    public function variables(array $variables): SMSProvider
    {
        $this->variables = array_merge($this->variables, $variables);

        return $this;
    }

    /**
     * Set message content.
     *
     * @param $message
     * @return SMSProvider
     */
    public function message($message): SMSProvider
    {
        $this->message = (string) __($message, $this->variables);

        return $this;
    }

    /**
     * Set send date.
     *
     * @param Carbon $date
     * @return SMSProvider
     */
    public function date(Carbon $date): SMSProvider
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Send the message
     *
     * @return Response
     */
    public function send()
    {
        $data = [
            'username' => $this->username,
            'password' => $this->password,
            'sender' => $this->sender,
            'mobile' => $this->recipient,
            'message' => $this->message,
            'unicodetype' => 'U',
        ];

        if ($this->date) {
            $data['date'] = $this->date->format('d/m/Y');
            $data['time'] = $this->date->format('h:i');
        }

        return Http::post(sprintf(
            'http://www.shamelsms.net/api/httpSms.aspx?%s',
            http_build_query($data)
        ));
    }
}
