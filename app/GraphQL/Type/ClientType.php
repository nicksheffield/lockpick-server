<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class ClientType extends GraphQLType {

	protected $attributes = [
		'name' => 'Client',
		'description' => 'A client'
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
				'description' => 'The id of the client'
			],
			'name' => [
				'type' => Type::string(),
				'description' => 'The name of the client'
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
			'sites' => [
				'type' => Type::listOf(GraphQL::type('Site')),
				'description' => 'The clients sites'
			]
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