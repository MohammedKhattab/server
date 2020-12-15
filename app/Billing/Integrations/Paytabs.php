<?php

namespace App\Billing\Integrations;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Paytabs
{
    /**
     * @var string
     */
    private string $merchant_email;

    /**
     * @var string
     */
    private string $merchant_secret_key;

    /**
     * Paytabs constructor.
     */
    public function __construct()
    {
        $this->setMerchantEmail(setting('payments.paytabs_email'));
        $this->setMerchantSecretKey(setting('payments.paytabs_secret'));
    }

    /**
     * @param mixed $email
     */
    private function setMerchantEmail($email): void
    {
        $this->merchant_email = $email;
    }

    /**
     * @param mixed $secret_key
     */
    private function setMerchantSecretKey($secret_key): void
    {
        $this->merchant_secret_key = $secret_key;
    }

    /**
     * @return mixed
     */
    private function getMerchantEmail()
    {
        return $this->merchant_email;
    }

    /**
     * @return mixed
     */
    private function getMerchantSecretKey()
    {
        return $this->merchant_secret_key;
    }

    /**
     * @param string $url
     * @param array $data
     * @return Response
     */
    protected function send($url, array $data = [])
    {
        return Http::asForm()
            ->baseUrl('https://www.paytabs.com/apiv2')
            ->post($url, $data);
    }

    /**
     * @return bool
     */
    protected function authentication()
    {
        $response = $this->send('validate_secret_key', [
            'merchant_email' => $this->getMerchantEmail(),
            'secret_key' => $this->getMerchantSecretKey()
        ])->json();

        return isset($response['response_code']) && $response['response_code'] === '4000';
    }

    /**
     * @param $reference
     * @return array|mixed
     * @throws Exception
     */
    public function verify($reference)
    {
        $response = $this->send('verify_payment', [
            'merchant_email' => $this->getMerchantEmail(),
            'secret_key' => $this->getMerchantSecretKey(),
            'payment_reference' => $reference
        ])->json();

        if ($response['response_code'] != 100) {
            throw new Exception('There are no transactions available.');
        }

        return $response;
    }

    /**
     * @param array $data
     * @return string
     * @throws Exception
     */
    public function createPaymentPage($data)
    {
        if ($this->authentication()) {
            $response = $this->send('create_pay_page', array_merge([
                'merchant_email' => $this->getMerchantEmail(),
                'secret_key' => $this->getMerchantSecretKey(),
                'ip_customer' => request()->ip(),
                'ip_merchant' => request()->ip(),
                'cms_with_version' => 'API USING PHP',
                'msg_lang' => 'Arabic',
                'cc_phone_number' => '00966',
                'currency' => 'SAR',
                'postal_code' => '00966',
                'postal_code_shipping' => '00966',
                'country' => 'SAU',
                'country_shipping' => 'SAU',
            ], $data))->json();

            if ($response['response_code'] == 4012) {
                return $response['payment_url'];
            }

            throw new Exception($response['result'] ?? $response['details']);
        }

        throw new Exception('Paytabs username or password not valid');
    }
}
