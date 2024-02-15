# Data dictionary

## Table _Recipes_ (`recipes`)

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| recipeCode | INT | Id of the recipe | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |
| title | VARCHAR(255) | Title of the recipe | NOT NULL |
| picture | VARCHAR(255) | Path of the picture of the recipe | - |
| creationDate | TIMESTAMP | Creation date of the recipe in the database | NOT NULL |
| time | INT | Time needed to prepare the recipe | UNSIGNED |
| categoryCode | INT | Id of the category of the recipe (starter, desert...) | SECONDARY KEY, UNSIGNED, NOT NULL |
| difficultyCode | INT | Id of the difficulty level of the recipe | SECONDARY KEY, UNSIGNED |
| weatherCode | INT | Id of the weather suitable to prepare the recipe (sunny, cloudy, ...) | SECONDARY KEY, UNSIGNED |
| userCode | INT | Id of the user who created the recipe | SECONDARY KEY, UNSIGNED, NOT NULL |

## Table _Foods_ (`foods`)

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| foodCode | INT | Id of the food | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |
| name | VARCHAR(100) | Name of the food | NOT NULL |

## Table _Instructions_ (`instructions`)

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| instructionCode | INT | Id of the instruction | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |
| description | TEXT | Description of one instruction of the recipe | NOT NULL |
| batchcook | BOOLEAN | Can the instruction be realized as batch cooking? | - |
| position | INT |  Position of the instruction among all instructions of the recipe | UNSIGNED, NOT NULL |

## Table _Categories_ (`categories`)

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| categoryCode | INT | Id of the category of the recipe (starter, desert...) | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |
| category | VARCHAR(80) | Name of the category of the recipe (starter, desert...) | NOT NULL |

## Table _Difficulty levels_ (`difficulties`)

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| difficultyCode | INT | Id of the difficulty level of the recipe | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |
| difficulty | VARCHAR(30) | Level of difficulty of the recipe | NOT NULL |

## Table _Weathers_ (`weathers`)

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| weatherCode | INT | Id of the weather suitable to prepare the recipe (sunny, cloudy, ...) | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |
| weather | VARCHAR(80) | Name of the category of weather suitable to prepare the recipe (sunny, cloudy, ...) | NOT NULL |

## Table _Seasons_ (`seasons`)

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| seasonCode | INT | Id of the season suitable for the foods of the recipe | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |
| season | VARCHAR(30) | Name of the season suitable for the foods of the recipe | NOT NULL |

## Table _Tags_ (`tags`)

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| tagCode | INT | Id of the tag of the recipe | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |
| tag | VARCHAR(100) | Name of the tag of the recipe | NOT NULL |
| position | INT | Position of the tag among the entire list of tags, to display all tags in a specific order | NOT NULL, UNSIGNED |
| alwaysProposed | BOOLEAN | Specifies if the tag is a generic tag which is always proposed to be selected when creating a new recipe or searching for recipes | NOT NULL |

## Table _Portions_ (`portions`)

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| portionsCode | INT | Id of the number of portions for the recipe | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |
| nbPortions | INT | Number of portions for the recipe | NOT NULL, UNSIGNED |

## Table _Meals_ (`meals`)

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| mealCode | INT | Id of the meal date/time | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |
| mealDateTime | DATETIME | Date/time of of the meal (for instance: 01/25/2024 12am) | NOT NULL |

## Table _Users_ (`users`)

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| userCode | INT | Id of the user who created the recipe | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |
| name | VARCHAR(100) | User's name | NOT NULL |
| firstname | VARCHAR(100) | User's firstname | NOT NULL |
| email | VARCHAR(100) | User's email address | NOT NULL |

## Table _Books of recipes_ (`books`)

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| bookCode | INT | Id of the book of recipes | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |
| title | VARCHAR(255) | Title of the book of recipes | NOT NULL |
| position | INT | Position of the book of recipes among all user's books (_evolution_) | UNSIGNED |
| userCode | INT | Id of the user who created the recipe | SECONDARY KEY, UNSIGNED, NOT NULL |

## Table of relationship _`FOLLOW`_ between tables _`recipes`_ and _`instructions`_

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| recipeCode | INT | Id of the recipe | PRIMARY KEY, UNSIGNED, NOT NULL |
| instructionCode | INT | Id of the instruction | PRIMARY KEY, UNSIGNED, NOT NULL |

## Table of relationship _`BELONG TO`_ between tables _`recipes`_ and _`tags`_

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| recipeCode | INT | Id of the recipe | PRIMARY KEY, UNSIGNED, NOT NULL |
| tagCode | INT | Id of the tag of the recipe | PRIMARY KEY, UNSIGNED, NOT NULL |

## Table of relationship _`PLAN`_ between tables _`users`_ and _`meals`_

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| userCode | INT | Id of the user who created the recipe | PRIMARY KEY, UNSIGNED, NOT NULL |
| mealCode | INT | Id of the meal date/time | PRIMARY KEY, UNSIGNED, NOT NULL |

## Table of relationship _`LIST`_ between tables _`books`_ and _`recipes`_

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| bookCode | INT | Id of the book of recipes | PRIMARY KEY, UNSIGNED, NOT NULL |
| recipeCode | INT | Id of the recipe | PRIMARY KEY, UNSIGNED, NOT NULL |

## Table of relationship _`CAN BE COOKIED IN`_ between tables _`seasons`_ and _`recipes`_

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| seasonCode | INT | Id of the season suitable for the foods of the recipe | PRIMARY KEY, UNSIGNED, NOT NULL |
| recipeCode | INT | Id of the recipe | PRIMARY KEY, UNSIGNED, NOT NULL |

## Table of relationship _`CALL`_ between tables _`meals`_, _`recipes`_ and _`portions`_

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| mealCode | INT | Id of the meal date/time | PRIMARY KEY, UNSIGNED, NOT NULL |
| recipeCode | INT | Id of the recipe | PRIMARY KEY, UNSIGNED, NOT NULL |
| portionsCode | INT | Id of the number of portions for the recipe | PRIMARY KEY, UNSIGNED, NOT NULL |

## Table of relationship _`REQUIRE`_ between tables _`recipes`_, _`foods`_ and _`instructions`_

| Variable | Type | Description | Specific feature |
| --- | --- | --- | --- |
| recipeCode | INT | Id of the recipe | PRIMARY KEY, UNSIGNED, NOT NULL |
| foodCode | INT | Id of the food | PRIMARY KEY, NOT NULL, UNSIGNED |
| portionsCode | INT | Id of the number of portions for the recipe | PRIMARY KEY, NOT NULL, UNSIGNED |
| quantity | INT | Quantity of food required for the number of portions for the recipe | NOT NULL, UNSIGNED |
