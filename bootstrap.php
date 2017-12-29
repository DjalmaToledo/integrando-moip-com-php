<?php

require __DIR__."/vendor/autoload.php";

use Moip\Moip;
use Moip\Resource\Customer;
use Moip\Auth\BasicAuth;

$token = 'GXZGCARKAWVVHIKU64FQ068HJ1MHCZML';
$key = '7KT8PFQ5MDVEPHLGFBC5GEDJZXJPZ3YKY4KYPXZT';

$moip = new Moip(new BasicAuth($token, $key), Moip::ENDPOINT_SANDBOX);

/*$customer = $moip->customers()->setOwnId(uniqid())
    ->setFullname('Fulano de Tal')
    ->setEmail('iasdhasod@gmail.com')
    ->setBirthDate('1985-08-15')
    ->setTaxDocument('12312312311')
    ->setPhone(12, 988888888)
    ->addAddress(Customer::ADDRESS_BILLING, 'Rua Tal', 123, 'Centro', 'Caraguatatuba', 'SP', '11676085')
    ->addAddress(Customer::ADDRESS_SHIPPING, 'Rua Tal', 123, 'Centro', 'Caraguatatuba', 'SP', '11676085')
    ->create();

$customer = $moip->customers()->get('CUS-5UVMTJCKJOFJ');

$customer->creditCard()
    ->setExpirationMonth('08')
    ->setExpirationYear('2020')
    ->setNumber('4222222222222222')
    ->setCVC('456')
    ->setFullName('Fulano de Tal')
    ->setBirthDate('1985-08-15')
    ->setTaxDocument('CPF', '12312312311')
    ->setPhone('55', '12', '988888888')
    ->create('CUS-5UVMTJCKJOFJ');


$customer = $moip->customers()->get('CUS-5UVMTJCKJOFJ');


$order = $moip->orders()->setOwnId(uniqid())
    ->addItem('Notebook Samsung', 1, "sku1", 350050)
    ->addItem('TV 55', 1, "sku2", 280000)
    ->addItem('Cadeiras de praia', 2, "sku1", 5500)
    ->setShippingAmount(6500)
    ->setAddition(500)
    ->setDiscount(3000)
    ->setCustomer($customer)
    ->create();

var_dump($order);

$order = $moip->orders()->get('ORD-5IWHEO60Y753');
var_dump($order);

$filters = new Moip\Helper\Filters;
$filters->greaterThanOrEqual(Moip\Resource\OrdersList::CREATED_AT, '2017-01-01');
$pagination = new Moip\Helper\Pagination(10, 0);

$orders = $moip->orders()->getList(null, null, 'Fulano de Tal');
print_r($orders);

$customer = $moip->customers()->get('CUS-5UVMTJCKJOFJ');
$order = $moip->orders()->get('ORD-5IWHEO60Y753');

$hash = 'EOmUkbFkjWBpl7rS3zS1njwpTPzaMZ+RMhbEMbgUgW/345S0IiFbaGV8JlxGTLgXUoz8bOUSYzOBrnAzIGuZz5tjYqZjBImPz81jAtOhBl80TD3UkHGv8/RjBCnXZd+gIAS+scxlOuGv93yF4J+pzizDywS0w5BgDzyVcvr6w/zYy/MMk4mL5U2fi7FkQLkafJ77CVPLYdQi/plznuTYczFnw9j3V4ypxEDHjxt2Mi71J9XtpUSAd6xB6x2eYHemrxyp93pXPW/KXdQnxhh3lrlfsVmfyX4B3ph5MxCsOsIFlIyJ6gS+MB9NKuBz/oZSkdyXdnELQgudXnYcECgwWg==';

$payment  = $order->payments()
    ->setCreditCardHash($hash, $customer)
    ->setInstallmentCount(4)
    ->setStatementDescriptor('Teste da SON')
    ->execute();

var_dump($payment);

$customer = $moip->customers()->get('CUS-5UVMTJCKJOFJ');
$order = $moip->orders()->setOwnId(uniqid())
    ->addItem('Notebook Samsung', 1, "sku1", 350050)
    ->addItem('TV 55', 1, "sku2", 280000)
    ->addItem('Cadeiras de praia', 2, "sku1", 5500)
    ->setShippingAmount(6500)
    ->setAddition(500)
    ->setDiscount(3000)
    ->setCustomer($customer)
    ->create();

$payment = $order->payments()
    ->setCreditCard(05, 18, '5555666677778884', '123', $customer)
    ->execute();

var_dump($payment);

$customer = $moip->customers()->get('CUS-5UVMTJCKJOFJ');
$order = $moip->orders()->setOwnId(uniqid())
    ->addItem('Notebook Samsung', 1, "sku1", 350050)
    ->addItem('TV 55', 1, "sku2", 280000)
    ->addItem('Cadeiras de praia', 2, "sku1", 5500)
    ->setShippingAmount(6500)
    ->setAddition(500)
    ->setDiscount(3000)
    ->setCustomer($customer)
    ->create();

$expiration_date = new DateTime();
$expiration_date->add(new DateInterval('P1M'));
$logo_uri = 'https://cdn.moip.com.br/wp-content/uploads/2016/05/02163352/logo-moip.png';
$instructions = [
    'O que fazer 1',
    'O que fazer 2',
    'O que fazer 3',
];

$payment = $order->payments()
    ->setBoleto($expiration_date, $logo_uri, $instructions)
    ->execute();

var_dump($payment->getLinks()->getLink('payBoleto'));
*/
$customer = $moip->customers()->get('CUS-5UVMTJCKJOFJ');
$order = $moip->orders()->setOwnId(uniqid())
    ->addItem('Notebook Samsung', 1, "sku1", 350050)
    ->addItem('TV 55', 1, "sku2", 280000)
    ->addItem('Cadeiras de praia', 2, "sku1", 5500)
    ->setShippingAmount(6500)
    ->setAddition(500)
    ->setDiscount(3000)
    ->setCustomer($customer)
    ->create();

$expiration_date = new DateTime();
$expiration_date->add(new DateInterval('P1M'));

$payment = $order->payments()
    ->setOnlineBankDebit('341', $expiration_date, 'http://localhost:8000')
    ->execute();

var_dump($payment->getLinks()->getLink('payOnlineBankDebitItau'));
