<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Question;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    public function run()
    {

        DB::table('users')->insert([
        'id' => 1,
        'email' => 'admin@example.com',
        'password' => bcrypt('admin'),
    ]);


        $quiz = Quiz::create([
            'name' => 'F1 Quiz',
            'picture' => 'https://www.1jour1actu.com/wp-content/uploads/2017/12/quiz-2-927x618.jpg',
            'description' => 'This is Quiz about dog breeds in the world',
            'author_id' => 1,
        ]);

        $quiz->questions()->createMany([
            [
                'question' => 'What is the most popular breed in the United States?',
                'picture' => 'https://cdn.pixabay.com/photo/2016/02/19/15/46/labrador-retriever-1210559_960_720.jpg',
                'firstAnswer' => 'Labrador Retrievers',
                'secondAnswer' => 'Beagles',
                'thirdAnswer' => 'Poodles',
                'fourthAnswer' => 'Bulldogs',
                'position' => 1,
                'correctAnswer' => 1,
            ],
            [
                'question' => 'Which one of these foods is toxic for dogs?',
                'picture' => 'https://images.unsplash.com/photo-1585849834908-3481231155e8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80',
                'firstAnswer' => 'Raspberry',
                'secondAnswer' => 'Carrot',
                'thirdAnswer' => 'Broccoli',
                'fourthAnswer' => 'Onion',
                'position' => 2,
                'correctAnswer' => 4,
            ],
            [
                'question' => 'Which country has the highest pet dog population in the world?',
                'picture' => 'https://travelmamas.com/wp-content/uploads/2020/04/first_state_usa_square.jpg',
                'firstAnswer' => 'The UK',
                'secondAnswer' => 'France',
                'thirdAnswer' => 'United States',
                'fourthAnswer' => 'Russia',
                'position' => 3,
                'correctAnswer' => 3,
            ],
            [
                'question' => 'Which one of the following dogs doesn’t bark?',
                'picture' => 'http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcTq30P0MtPNA3E6F1sa7n66dSKIsXsE6hD7UsudYy7H0gCTZsR4egtdzHb2_XnjDGSHhckDWz4eYzQ_Ffk',
                'firstAnswer' => 'Shiba Inu',
                'secondAnswer' => 'Chow Chow',
                'thirdAnswer' => 'Pharaoh Hound',
                'fourthAnswer' => 'Basenji',
                'position' => 4,
                'correctAnswer' => 4,
            ],
        ]);
    }
}