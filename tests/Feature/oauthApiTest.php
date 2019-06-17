<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Artisan;

class oauthApiTest extends TestCase
{

	/**
	 * Setup
	 */
	public function setUp(): void{
		parent::setUp();

		if( !env('APP_DEBUG') || !is_file('./.testing') ){
			// Fool proof
			return;
		}

		//artisan
		Artisan::call('migrate:refresh');
		Artisan::call('db:seed');
		Artisan::call('db:seed', array('--class'=>'DummyDataSeeder'));
	}

	/**
	 * A basic test.
	 *
	 * @return void
	 */
	public function testBasicTest()
	{
		// Fool proof
		$this->assertTrue( env('APP_DEBUG') );
		$this->assertTrue( is_file('./.testing') );


		$user = User::find('testuser-id-0000000001');
		$this->actingAs($user);
		$response = $this->get('/settings/profile');
		$response->assertStatus(200);
		$response->assertSeeText('test1@example.com');

	}

	/**
	 * An API test.
	 *
	 * @return void
	 */
	public function testApiTest()
	{
		// Fool proof
		$this->assertTrue( env('APP_DEBUG') );
		$this->assertTrue( is_file('./.testing') );


		// Unauthorized request
		$response = $this->get('/api/user');
		$response->assertStatus(302);
		$response->assertRedirect(url('/login'));


		// Authorized as user Test1
		$user = User::find('testuser-id-0000000001');
		$response = $this->actingAs($user, 'api')->get('/api/user');
		// ob_start();var_dump(json_decode(json_encode($response->baseResponse),true));error_log(ob_get_clean(),3,__DIR__.'/__dump.txt');
		$response->assertStatus(200);
		$response->assertJson([
			'email' => 'test1@example.com',
		]);


		$response = $this->actingAs($user, 'api')->get('/api/user_info');
		// ob_start();var_dump(json_decode(json_encode($response->baseResponse),true));error_log(ob_get_clean(),3,__DIR__.'/__dump.txt');
		$response->assertStatus(200);
		$response->assertJson([
			'user' => [
				'email' => 'test1@example.com',
			]
		]);

	}
}