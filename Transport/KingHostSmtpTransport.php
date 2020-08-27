<?php declare(strict_types=1);


namespace JrBarros\Mailer\Bridge\KingHost\Transport;


use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * Class KingHostSmtpTransport
 * @package App\Transport
 */
class KingHostSmtpTransport extends EsmtpTransport
{

    public const KING_HOST_BRAZIL = 'kinghost+smtp';
    public const KING_HOST_INTERNATIONAL = 'kinghost+smtpi';
    public const KING_HOST_SMTP_INTERNATIONAL = 'smtpi.kinghost.net';

    public function __construct(string $username, string $password, EventDispatcherInterface $dispatcher = null, LoggerInterface $logger = null, $smtp = 'smtp.kinghost.net')
    {
        parent::__construct($smtp, 587, false, $dispatcher, $logger);

        $this->setUsername($username);
        $this->setPassword($password);
    }
}
