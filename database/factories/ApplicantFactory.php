<?php

namespace Database\Factories;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Applicant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = [
            'first'  => $this->faker->firstName(),
            'last'   => $this->faker->lastName(),
            'middle' => $this->faker->lastName(),
        ];

        $personal = [
            'civil_status'   => $this->faker->randomElement(config('lists.civilStatus')),
            'birthday'       => $this->faker->date(),
            'birthplace'     => $this->faker->address(),
            'sex'            => $this->faker->randomElement(config('lists.sex')),

            "address"        => [
                "present"   => $this->faker->address(),
                "permanent" => $this->faker->address(),
            ],

            'contact_number' => '09123456789',
            'email_address'  => $this->faker->safeEmail(),
        ];

        $school = [
            "name"       => 'ASCOT',
            "address"    => 'BALER AURORA',
            "year_level" => $this->faker->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year']),
            "gwa"        => '1.5'
        ];

        $family = [
            'father'  => [
                "name"           => $this->faker->name('male'),
                "occupation"     => $this->faker->jobTitle(),
                "address"        => $this->faker->address(),
                "contact_number" => $this->faker->phoneNumber(),
                "employer"       => $this->faker->company(),
            ],

            'mother'  => [
                "name"           => $this->faker->name('female'),
                "occupation"     => $this->faker->jobTitle(),
                "address"        => $this->faker->address(),
                "contact_number" => $this->faker->phoneNumber(),
                "employer"       => $this->faker->company(),
            ],

            'assets'  => 'none',
            'member'  => $this->faker->randomDigit(),
            'income'  => $this->faker->numberBetween(1000, 10000),
            'living'  => "no",
            'sibling' => "wala",
            'sponsor' => "wala",
        ];

        $other = [
            "working" => $this->faker->randomElement(['yes', 'no']),

            "apply"   => [
                "sem"   => "N/A",
                "where" => "N/A",
            ],
            "ol"      => [
                "own"      => "N/A",
                "type"     => "N/A",
                "internet" => "N/A",
            ],
        ];


        return [
            'name'     => $name,
            'personal' => $personal,
            'school'   => $school,
            'family'   => $family,
            'other'    => $other,
        ];
    }
}
