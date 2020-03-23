# Laravel Service Container for task management

### What is service container in Laravel

The Laravel service container is a powerful tool for managing class dependencies and performing dependency injection.You can create object automatically using laravel service container instead of creating manually.

Here, we have created custom laravel service container.

### Installation

    $  git clone https://github.com/helipatel19/laravel-service-container.git

    $ cp .env.example .env
    
You need to update username and password into `.env` file.
    
    $ composer install
    
    $ php artisan migrate
    
### Test cases:

Here, we have created a test case to verify that user can view tasks:

        public function user_can_view_tasks(){
        
            //Given we have an authenticated user        
            $this->actingAs(factory('App\User')->create());
                    
            //Given we have an task in database
            $task = factory('App\Task')->make();
            
            //When user visit the task page
            $response = $this->get('/task'); 
            
            // an user should be able to view tasks
            $response->assertOk();
            
        }
    
Now, we have created another test case for adding tasks.

        public function user_can_add_tasks(){
            
            //Given we have an authenticated user and a task object
            
            $task = [
                'title' => $this->faker->sentence,
                'description' => $this->faker->paragraph,
            ];
            
            $user = factory(User::class)->create();
            $response = $this->actingAs($user)
                                 ->withSession(['id' => $user->id])
                                 ->post('/task/store', $task);
            
            //When user submits post request to create task endpoint
            //It gets stored in the database
               $response->assertRedirect('/task');
         }

Run the tests, and you should get green !
