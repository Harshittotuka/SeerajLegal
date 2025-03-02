<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PracticesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $practices = [
            [
                'practice_name' => 'Banking and Finance',
                'para_sno' => 1,
                'title' => 'What is Banking and Finance?',
                'para' => 'This area deals with laws regulating financial institutions, transactions, loans, investments, and compliance with financial regulations. It plays a crucial role in supporting economic growth by ensuring secure financial operations...',
                'points' => json_encode(['Criminal enim miss the obortis', 'Vitae ehica drana risus duise', 'Navida is the haretra fermen']),
                'what_we_provide' => json_encode(['Arbitration', 'Concilation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'practice_name' => 'Banking and Finance',
                'para_sno' => 2,
                'title' => 'How can we help?',
                'para' => 'As a law firm, we assist with drafting loan agreements, ensuring regulatory compliance, advising on investment deals, and representing clients in financial disputes...',
                'points' => null,
                'what_we_provide' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'practice_name' => 'Criminal Law',
                'para_sno' => 1,
                'title' => 'What is Criminal Law?',
                'para' => 'Criminal law focuses on offenses against the state, including theft, assault, fraud, and more serious crimes like murder and terrorism...',
                'points' => null,
                'what_we_provide' => json_encode(['Concilation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'practice_name' => 'Criminal Law',
                'para_sno' => 2,
                'title' => 'How can we help?',
                'para' => 'We provide expert defense strategies, represent clients during trials, assist with bail procedures, and handle appeals...',
                'points' => null,
                'what_we_provide' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'practice_name' => 'Private Firms',
                'para_sno' => 1,
                'title' => 'What is Private Firms?',
                'para' => 'Legal services for private firms cover company formation, mergers and acquisitions, intellectual property rights, contract negotiations, and compliance with corporate laws...',
                'points' => json_encode(['Criminal enim miss the obortis', 'Vitae ehica drana risus duise', 'Navida is the haretra fermen']),
                'what_we_provide' => json_encode(['Arbitration', 'Concilation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'practice_name' => 'Private Firms',
                'para_sno' => 2,
                'title' => 'How can we help?',
                'para' => 'Our firm offers comprehensive legal support, from drafting contracts and handling negotiations to advising on corporate governance...',
                'points' => null,
                'what_we_provide' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'practice_name' => 'Civil Law',
                'para_sno' => 1,
                'title' => 'What is Civil Law?',
                'para' => 'Civil law addresses non-criminal disputes, including property issues, family law matters, contracts, tort claims, and succession planning...',
                'points' => json_encode(['Criminal enim miss the obortis', 'Vitae ehica drana risus duise', 'Navida is the haretra fermen']),
                'what_we_provide' => json_encode(['Arbitration', 'Concilation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'practice_name' => 'Civil Law',
                'para_sno' => 2,
                'title' => 'How can we help?',
                'para' => 'We help by representing clients in court, drafting legal documents, and offering alternative dispute resolution methods...',
                'points' => null,
                'what_we_provide' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'practice_name' => 'Real Estate & Construction',
                'para_sno' => 1,
                'title' => 'What is Real Estate & Construction?',
                'para' => 'This practice covers legal aspects of property transactions, construction contracts, land use regulations, and real estate disputes...',
                'points' => null,
                'what_we_provide' => json_encode(['Arbitration', 'Concilation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'practice_name' => 'Real Estate & Construction',
                'para_sno' => 2,
                'title' => 'How can we help?',
                'para' => 'We provide legal advice on property acquisitions, draft construction contracts, resolve real estate disputes...',
                'points' => null,
                'what_we_provide' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'practice_name' => 'Consumer Forums',
                'para_sno' => 1,
                'title' => 'What is Consumer Forums?',
                'para' => 'Consumer law protects buyers against unfair trade practices, defective products, and deficient services...',
                'points' => json_encode(['Criminal enim miss the obortis', 'Vitae ehica drana risus duise', 'Navida is the haretra fermen']),
                'what_we_provide' => json_encode(['Concilation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'practice_name' => 'Consumer Forums',
                'para_sno' => 2,
                'title' => 'How can we help?',
                'para' => 'Our firm assists clients in filing consumer complaints, representing them before consumer forums...',
                'points' => null,
                'what_we_provide' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('practices')->insert($practices);
    }
}
