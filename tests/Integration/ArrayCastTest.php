<?php

namespace Crudly\Encrypted\Tests\Integration;

use Crudly\Encrypted\Tests\TestCase;
use Crudly\Encrypted\Tests\Models\Model;

class ArrayCastTest extends TestCase
{
	protected $model;
	protected $value;
	protected $encrypted;

	protected function setUp(): void
	{
		parent::setUp();

		$this->model = new Model;
		$this->value = ['confidential', 'classified'];
		$this->encrypted = encrypt($this->value);
	}

	/**
	 * Encryption for arrays.
	 */
	public function testSetter(): void
	{
		$this->model->column = $this->value;
		$set = $this->model->getAttributes()['column'];

		$this->assertIsString($set);
		$this->assertNotSame($this->value, $set);
		$this->assertSame($this->value, decrypt($set));
	}

	/**
	 * Decryption for arrays.
	 */
	public function testGetter(): void
	{
		$this->model->setRawAttributes(['column' => $this->encrypted]);
		$get = $this->model->column;
		$this->assertSame($this->value, $get);
	}
}
