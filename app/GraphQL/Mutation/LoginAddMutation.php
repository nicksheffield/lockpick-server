<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Models\Login as Model;

class LoginAddMutation extends Mutation {

	protected $attributes = [
		'name' => 'LoginAdd'
	];

	public function type() {
		return GraphQL::type('Login');
	}

	public function args() {
		return [
			'username' => ['name' => 'username', 'type' => Type::nonNull(Type::string())],
			'password' => ['name' => 'password', 'type' => Type::nonNull(Type::string())],
			'site_id'  => ['name' => 'site_id',  'type' => Type::int()],
		];
	}

	public function resolve($root, $args) {
		$model = Model::create($args);

		return $model;
	}
}