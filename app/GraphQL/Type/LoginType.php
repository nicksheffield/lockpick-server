<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class LoginType extends GraphQLType {

	protected $attributes = [
		'name' => 'Login',
		'description' => 'Some login details'
	];
  
  /*
	 * Uncomment following line to make the type input object.
	 * http://graphql.org/learn/schema/#input-types
	 */
	// protected $inputObject = true;

	public function fields() {
		return [
			'id' => [
				'type' => Type::nonNull(Type::int()),
				'description' => 'The id of the site'
			],
			'username' => [
				'type' => Type::string(),
				'description' => 'The username'
			],
			'password' => [
				'type' => Type::string(),
				'description' => 'The password'
			],
			'created_at' => [
				'type' => Type::string(),
				'description' => 'The date created'
			],
			'updated_at' => [
				'type' => Type::string(),
				'description' => 'The date last updated'
			],
			'deleted_at' => [
				'type' => Type::string(),
				'description' => 'The date deleted'
			],
			'site' => [
				'type' => GraphQL::type('Site'),
				'description' => 'The site these login details are for'
			],
		];
	}

	public function resolveCreatedAtField($root, $args) {
		return $root->created_at->toIso8601String();
	}

	public function resolveUpdatedAtField($root, $args) {
		return $root->updated_at->toIso8601String();
	}

	public function resolveDeletedAtField($root, $args) {
		return $root->deleted_at->toIso8601String();
	}
}