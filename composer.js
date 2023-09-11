{
	"name": "wpessential-hero/wpessential-hero",
	"type": "library",
	"description": "It used to build and run the wp query and return the results.",
	"keywords": [
		"query",
		"wp-query"
	],
	"homepage": "https://wpessential.org/",
	"require": {
	},
	"autoload": {
		"psr-4": {
			"WPEssentialQueryBuilder\\": "src/"
		}
	},
	"scripts": {
		"test": [
			"@phpunit",
			"@style-check"
		],
		"style-check": [
			"@phpcs",
			"@phpstan",
			"@phpmd"
		],
		"phpunit": "phpunit --verbose",
		"phpcs": "php-cs-fixer fix -v --diff --dry-run",
		"phpstan": "phpstan analyse --configuration phpstan.neon --level 3 src tests",
		"phpmd": "phpmd src text /phpmd.xml",
		"phpdoc": "php phpdoc.php"
	}
}
