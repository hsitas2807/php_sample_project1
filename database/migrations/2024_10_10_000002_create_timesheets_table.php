public function up()
{
Schema::create('timesheets', function (Blueprint $table) {
$table->id();
$table->foreignId('user_id')->constrained()->onDelete('cascade');
$table->foreignId('project_id')->constrained()->onDelete('cascade');
$table->string('task_name');
$table->date('date');
$table->integer('hours');
$table->timestamps();
});
}
