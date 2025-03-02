<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            ['Sno' => 1, 'Question' => 'What is Seeraj Legal Relief Foundation?', 'Answer' => 'Seeraj Legal Relief Foundation is a non-government organization focused on providing legal support, resolving disputes cost-effectively, and spreading legal awareness through programs.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 2, 'Question' => 'What types of legal disputes do you handle?', 'Answer' => 'We handle firm disputes, private company matters, criminal issues, and civil disputes.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 3, 'Question' => 'How does arbitration work?', 'Answer' => 'Arbitration is an alternative dispute resolution method where a neutral third party makes a binding decision, helping resolve conflicts without going to court.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 4, 'Question' => 'What is mediation?', 'Answer' => 'Mediation involves a neutral mediator helping parties reach a mutually agreed solution, commonly used for family, business, and commercial disputes.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 5, 'Question' => 'What is the difference between civil and criminal cases?', 'Answer' => 'Civil cases involve private disputes between individuals or organizations, while criminal cases deal with offenses against the state or public.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 6, 'Question' => 'How can I draft a contract with legal assistance?', 'Answer' => 'Our legal team assists in drafting contracts by ensuring all terms are clear, legally compliant, and protect your interests.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 7, 'Question' => 'What is Lok Adalat?', 'Answer' => 'Lok Adalat is a forum where cases pending in courts or at the pre-litigation stage are settled amicably through compromise.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 8, 'Question' => 'What kind of legal advice do you provide?', 'Answer' => 'We offer legal advice on business laws, property disputes, contract drafting, family law, and criminal defense strategies.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 9, 'Question' => 'Can you help with debt recovery?', 'Answer' => 'Yes, we assist clients in recovering outstanding debts through legal means, including negotiation, arbitration, and court proceedings.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 10, 'Question' => 'What is the role of negotiation in dispute resolution?', 'Answer' => 'Negotiation is a process where parties discuss their issues directly or through lawyers to reach a mutually beneficial agreement.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 11, 'Question' => 'How do you ensure client confidentiality?', 'Answer' => 'We strictly adhere to legal ethics and confidentiality agreements, ensuring that client information is protected at all times.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 12, 'Question' => 'Do you offer pro bono services?', 'Answer' => 'Yes, we provide free legal services to marginalized communities as part of our commitment to social justice.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 13, 'Question' => 'How can I contact Seeraj Legal Relief Foundation?', 'Answer' => 'You can contact us through our official website, email, or by visiting our office during working hours.', 'created_at' => now(), 'updated_at' => now()],
            ['Sno' => 14, 'Question' => 'What is conciliation in legal terms?', 'Answer' => 'Conciliation is a dispute resolution method where a conciliator meets with parties to lower tensions, improve communication, and find a solution.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
