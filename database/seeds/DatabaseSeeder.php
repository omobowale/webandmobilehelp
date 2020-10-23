<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(PageGeneralContentSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(LogoSeeder::class);
        $this->call(FooterSeeder::class);
        $this->call(ContentSeeder::class);
        $this->call(HomeContentSeeder::class);
        $this->call(AboutContentSeeder::class);
        $this->call(CoreValueSeeder::class);
        $this->call(ServicesContentSeeder::class);
        $this->call(PortfolioContentSeeder::class);
        $this->call(ContactContentSeeder::class);
        $this->call(CommonContentSeeder::class);
        $this->call(BlogContentSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(CommentsSeeder::class);
        $this->call(CommentatorSeeder::class);
        $this->call(HashTagSeeder::class);
        $this->call(BlogHashTagSeeder::class);
    }
}