<?php declare(strict_types=1);

namespace JrBarros\Mailer\Bridge\KingHost\Tests\Transport;

use JrBarros\Mailer\Bridge\KingHost\Transport\KingHostSmtpTransport;
use JrBarros\Mailer\Bridge\KingHost\Transport\KingHostTransportFactory;
use Symfony\Component\Mailer\Test\TransportFactoryTestCase;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\TransportFactoryInterface;


/**
 * Class KingHostTransportFactoryTest
 * @package JrBarros\Mailer\Bridge\KingHost\Tests\Transport
 */
class KingHostTransportFactoryTest extends TransportFactoryTestCase
{

    public function getFactory(): TransportFactoryInterface
    {
        return new KingHostTransportFactory($this->getDispatcher(), $this->getClient(), $this->getLogger());
    }

    public function supportsProvider(): iterable
    {
        yield [
            new Dsn('kinghost+smtp', 'default'),
            true,
        ];
    }

    public function createProvider(): iterable
    {
        yield [
            new Dsn('kinghost+smtp', 'default', self::USER, self::PASSWORD),
            new KingHostSmtpTransport(self::USER, self::PASSWORD, $this->getDispatcher(), $this->getLogger()),
        ];
    }

    public function unsupportedSchemeProvider(): iterable
    {
        yield [
            new Dsn('kinghost+foo', 'default', self::USER, self::PASSWORD),
            'The "kinghost+foo" scheme is not supported; supported schemes for mailer "kinghost" are: "kinghost+smtp".',
        ];
    }

    public function incompleteDsnProvider(): iterable
    {
        yield [new Dsn('kinghost+smtp', 'default', self::USER)];

        yield [new Dsn('kinghost+smtp', 'default', null, self::PASSWORD)];
    }
}
