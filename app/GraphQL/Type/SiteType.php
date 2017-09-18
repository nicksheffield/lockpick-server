<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class SiteType extends GraphQLType {

	protected $attributes = [
		'name' => 'Site',
		'description' => 'A site'
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
			'name' => [
				'type' => Type::string(),
				'description' => 'The name of the site'
			],
			'url' => [
				'type' => Type::string(),
				'description' => 'The url of the site'
			],
			'notes' => [
				'type' => Type::string(),
				'description' => 'The notes for this site'
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
			'client' => [
				'type' => GraphQL::type('Client'),
				'description' => 'The client for this site'
			],
			'logins' => [
				'type' => Type::listOf(GraphQL::type('Login')),
				'description' => 'A list of logins for this site'
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