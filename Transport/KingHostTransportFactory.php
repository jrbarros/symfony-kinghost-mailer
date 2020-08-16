<?php declare(strict_types=1);


namespace JrBarros\Mailer\Bridge\KingHost\Transport;

use Symfony\Component\Mailer\Exception\UnsupportedSchemeException;
use Symfony\Component\Mailer\Transport\AbstractTransportFactory;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\TransportInterface;

/**
 * Class KingHostTransportFactory
 * @package JrBarros\Mailer\Bridge\KingHost\Transport
 */
class KingHostTransportFactory extends AbstractTransportFactory
{

    protected function getSupportedSchemes(): array
    {
        return ['kinghost+smtp'];
    }

    public function create(Dsn $dsn): TransportInterface
    {
        if (\in_array($dsn->getScheme(), $this->getSupportedSchemes())) {
            return new KingHostSmtpTransport($this->getUser($dsn), $this->getPassword($dsn), $this->dispatcher, $this->logger);
        }

        throw new UnsupportedSchemeException($dsn, 'kinghost', $this->getSupportedSchemes());
    }
}
