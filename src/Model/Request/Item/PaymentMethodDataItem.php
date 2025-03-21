<?php


namespace KassaCom\SDK\Model\Request\Item;


use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\PaymentMethods;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;
use KassaCom\SDK\Model\Types\PaymentMethodTokenType;
use KassaCom\SDK\Model\Types\PaymentType;
use KassaCom\SDK\Model\Types\PurseType;

class PaymentMethodDataItem extends AbstractRequestItem
{
    use RecursiveRestoreTrait;

    const WEBMONEY_WALLET_PURSE_R = 'R';
    const WEBMONEY_WALLET_PURSE_P = 'P';
    const WEBMONEY_WALLET_PURSE_Z = 'Z';
    const WEBMONEY_WALLET_PURSE_E = 'E';
    const WEBMONEY_WALLET_PURSE_U = 'U';
    const WEBMONEY_WALLET_PURSE_B = 'B';
    const WEBMONEY_WALLET_PURSE_T = 'T';

    const TOKEN_TYPE_GOOGLE_PAY = 'googlepay';
    const TOKEN_TYPE_APPLE_PAY = 'applepay';

    /**
     * @var string
     * @see \KassaCom\SDK\Model\PaymentMethods
     */
    private $type;

    /**
     * @var string
     */
    private $account;

    /**
     * @var string
     */
    private $cardNumber;

    /**
     * @var string
     */
    private $cardMonth;

    /**
     * @var string
     */
    private $cardYear;

    /**
     * @var string
     */
    private $cardSecurity;

    /**
     * @var string|null
     */
    private $cardholder;

    /**
     * @var string|null
     */
    private $purseType;

    /**
     * @var bool|null
     */
    private $capture;

    /**
     * @var string|null
     */
    private $tokenData;

    /**
     * @var string|null
     */
    private $tokenType;

    /** @var bool|null */
    protected $returnImage;

    /**
     * @return string
     * @see \KassaCom\SDK\Model\PaymentMethods
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     * @see \KassaCom\SDK\Model\PaymentMethods
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param string $account
     *
     * @return $this
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     *
     * @return $this
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getCardMonth()
    {
        return $this->cardMonth;
    }

    /**
     * @param string $cardMonth
     *
     * @return $this
     */
    public function setCardMonth($cardMonth)
    {
        $this->cardMonth = $cardMonth;

        return $this;
    }

    /**
     * @return string
     */
    public function getCardYear()
    {
        return $this->cardYear;
    }

    /**
     * @param string $cardYear
     *
     * @return $this
     */
    public function setCardYear($cardYear)
    {
        $this->cardYear = $cardYear;

        return $this;
    }

    /**
     * @return string
     */
    public function getCardSecurity()
    {
        return $this->cardSecurity;
    }

    /**
     * @param string $cardSecurity
     *
     * @return $this
     */
    public function setCardSecurity($cardSecurity)
    {
        $this->cardSecurity = $cardSecurity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCardholder()
    {
        return $this->cardholder;
    }

    /**
     * @param string|null $cardholder
     *
     * @return $this
     */
    public function setCardholder($cardholder)
    {
        $this->cardholder = $cardholder;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPurseType()
    {
        return $this->purseType;
    }

    /**
     * @param string|null $purseType
     *
     * @return $this
     */
    public function setPurseType($purseType)
    {
        $this->purseType = $purseType;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCapture()
    {
        return $this->capture;
    }

    /**
     * @param bool|null $capture
     *
     * @return $this
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTokenData()
    {
        return $this->tokenData;
    }

    /**
     * @param string|null $tokenData
     *
     * @return $this
     */
    public function setTokenData($tokenData)
    {
        $this->tokenData = $tokenData;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTokenType()
    {
        return $this->tokenType;
    }

    /**
     * @param string|null $tokenType
     *
     * @return $this
     */
    public function setTokenType($tokenType)
    {
        $this->tokenType = $tokenType;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getReturnImage()
    {
        return $this->returnImage;
    }

    /**
     * @param bool|null $returnImage
     *
     * @return $this
     */
    public function setReturnImage($returnImage)
    {
        $this->returnImage = $returnImage;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        $requiredFields = [
            'type' => new PaymentType($this),
        ];

        switch ($this->getType()) {
            case PaymentMethods::PAYMENT_METHOD_CARD:
                $requiredFields['card_number'] = RestorableInterface::TYPE_STRING;
                $requiredFields['card_month'] = RestorableInterface::TYPE_STRING;
                $requiredFields['card_year'] = RestorableInterface::TYPE_STRING;
                $requiredFields['card_security'] = RestorableInterface::TYPE_STRING;
                break;
            case PaymentMethods::PAYMENT_METHOD_MOBILE:
                $requiredFields['account'] = RestorableInterface::TYPE_STRING;
                break;
            case PaymentMethods::PAYMENT_METHOD_CARD_TOKENIZED:
                $requiredFields['token_data'] = RestorableInterface::TYPE_STRING;
                $requiredFields['token_type'] = new PaymentMethodTokenType($this);
                break;
        }

        return $requiredFields;
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'card_number' => RestorableInterface::TYPE_STRING,
            'card_month' => RestorableInterface::TYPE_STRING,
            'card_year' => RestorableInterface::TYPE_STRING,
            'card_security' => RestorableInterface::TYPE_STRING,
            'cardholder' => RestorableInterface::TYPE_STRING,
            'account' => RestorableInterface::TYPE_STRING,
            'capture' => RestorableInterface::TYPE_BOOLEAN,
            'purse_type' => new PurseType($this),
            'token_data' => RestorableInterface::TYPE_STRING,
            'token_type' => new PaymentMethodTokenType($this),
            'return_image' => self::TYPE_BOOLEAN,
        ];
    }
}
