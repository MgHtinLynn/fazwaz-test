# Technical Question
- I spend 4 hours completing the task and If I have more time, I would like to add the below features.
  - Filtering with bathroom, type, bedrooms and other fields
  - Build Responsive
- For most useful features in Laravel 9, type hinting is highly reliable for refactoring, static analysis, and code completion in their
```
    return Model::query()
	->whereNotExists(function($query) {
		// $query is a Query\Builder
	})
	->whereHas('relation', function($query) {
		// $query is an Eloquent\Builder
	})
	->with('relation', function($query) {
		// $query is an Eloquent\Relation
	});
```
- For track down a performance issue in production, yes I have an experiences for these issue
  - Firstly, I have to check sentry if we are using sentry log. If not , we can use other platform.
  - Second, I have to do analysis of issue and find root-cause. For performance, I have to check N+1 Query issue in Laravel using some tools (Laravel Debug-bar Or Prod Database server (SQL or Postgresql etc)). Because most of the laravel dev knew these problem.
  - Third, provide the solution for it, if very urgent, have to release first for short-term solutions and then find the long-term solutions for it.


# Task Estimation
- My Task Estimation is over 3 hours and total estimation is 4 hours

### 
- With Agile Scrum, I considered as 1 point per 1 hour
### Task
- Project Setup (Docker, Laravel, Vue) and Re-Learning VueJs (1 point)
- Preview user story and analysis (1 point)
- Implementation Process (1 point)
- Unit Testing (TDD) (1 Point)