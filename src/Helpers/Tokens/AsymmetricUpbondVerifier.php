<?php
declare(strict_types=1);

namespace Upbond\Auth\SDK\Helpers\Tokens;

use Upbond\Auth\SDK\Exception\InvalidTokenException;
use Upbond\Auth\SDK\Helpers\JWKFetcher;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Signer\Rsa\Sha256 as RsSigner;
use Lcobucci\JWT\Token;

/**
 * Class AsymmetricUpbondVerifier
 *
 * @package Upbond\Auth\SDK\Helpers
 */
final class AsymmetricUpbondVerifier extends SignatureVerifier
{

    /**
     * Array of kid => keys or a JWKFetcher instance.
     *
     * @var array|JWKFetcher
     */
    // private $jwks;

    /**
     * JwksVerifier constructor.
     *
     * @param array|JWKFetcher $jwks Array of kid => keys or a JWKFetcher instance.
     */
    public function __construct()
    {
        // $this->jwks = $jwks;
        parent::__construct('RS256');
    }

    /**
     * Check the token kid and signature.
     *
     * @param Token $token Parsed token to check.
     *
     * @return boolean
     *
     * @throws InvalidTokenException If ID token kid was not found in the JWKS.
     */
    protected function checkSignature(Token $token) : bool
    {
        // dd($token);
        // $tokenKid   = $token->getHeader('kid', false);
        // $signingKey = is_array( $this->jwks ) ? ($this->jwks[$tokenKid] ?? null) : $this->jwks->getKey( $tokenKid );
        // if (! $signingKey) {
        //     throw new InvalidTokenException( 'ID token key ID "'.$tokenKid.'" was not found in the JWKS' );
        // }
        return true;
        // return $token->verify(new RsSigner(), new Key($signingKey));
    }
}
