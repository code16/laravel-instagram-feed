<?php

namespace Code16\InstagramFeed\Tests\Tokens;

use Code16\InstagramFeed\AccessToken;
use Code16\InstagramFeed\Profile;
use Code16\InstagramFeed\Tests\FakesInstagramCalls;
use Code16\InstagramFeed\Tests\TestCase;

class AccessTokenTest extends TestCase
{
    use FakesInstagramCalls;

    public function test_a_token_can_be_created_from_an_instagram_response_array()
    {
        $profile = Profile::create(['username' => 'test user']);
        $token = AccessToken::createFromResponseArray($profile, $this->validUserWithToken());

        $this->assertEquals('VALID_LONG_LIVED_TOKEN', $token->access_code);
        $this->assertEquals('FAKE_USER_ID', $token->user_id);
        $this->assertEquals('instagram_test_username', $token->username);
        $this->assertEquals('not available', $token->user_fullname);
        $this->assertEquals('not available', $token->user_profile_picture);
    }
}