public function up()
{
Schema::create('users', function (Blueprint $table) {
$table->id();
$table->string('first_name');
$table->string('last_name');
$table->date('date_of_birth');
$table->enum('gender', ['male', 'female', 'other']);
$table->string('email')->unique();
$table->string('password');
$table->timestamps();
});
}
