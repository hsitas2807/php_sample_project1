public function up()
{
Schema::create('projects', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->string('department');
$table->date('start_date');
$table->date('end_date')->nullable();
$table->enum('status', ['active', 'completed', 'on_hold']);
$table->timestamps();
});
}
