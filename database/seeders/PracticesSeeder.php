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
                'para' => 'This area deals with laws regulating financial institutions, transactions, loans, investments, and compliance with financial regulations. It plays a crucial role in supporting economic growth by ensuring secure financial operations. The practice covers debt recovery, restructuring, mergers and acquisitions, securities, and handling financial fraud cases. It also involves advising clients on regulatory requirements imposed by financial authorities, helping them navigate complex financial landscapes. Additionally, it includes resolving disputes related to banking transactions, loan defaults, and cross-border financial issues.',
                'points' => json_encode(['Banking and finance law governs loans, investments, and financial regulations to ensure secure and compliant transactions.', 'It supports economic stability by managing financial disputes, fraud cases, and advising on regulatory compliance.', 'This field helps navigate complex financial systems, covering debt recovery, restructuring, and cross-border finance issues.']),
                'what_we_provide' => json_encode(['Arbitration', 'Conciliation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'flag' => 'enabled', // New flag column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'icon' => 'fa-solid fa-gavel',
                'image_path' => 'assets/dynamic/practices/Banking_and_Finance.webp',
                'top_image' => 'assets/dynamic/practices/top_Banking_and_Finance.webp',
            ],
            [
                'practice_name' => 'Banking and Finance',
                'para_sno' => 2,
                'title' => 'How can we help?',
                'para' => 'As a law firm, we assist with drafting loan agreements, ensuring regulatory compliance, advising on investment deals, and representing clients in financial disputes. Our services ensure smooth and secure financial transactions, providing expert guidance on managing financial risks, protecting your business interests, and facilitating successful financial operations.',
                'points' => null,
                'what_we_provide' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'icon' => 'fa-solid fa-gavel',
                'image_path' => 'assets/dynamic/practices/Banking_and_Finance.webp',
                'top_image' => 'assets/dynamic/practices/top_Banking_and_Finance.webp',
            ],
            [
                'practice_name' => 'Criminal Law',
                'para_sno' => 1,
                'title' => 'What is Criminal Law?',
                'para' => 'Criminal law focuses on offenses against the state, including theft, assault, fraud, and more serious crimes like murder and terrorism. It ensures that justice is served through the prosecution and defense of accused individuals. This area covers investigations, trials, bail applications, plea bargaining, and appeals. Criminal law also deals with economic offenses such as white-collar crimes, cybercrimes, and corruption. It plays a critical role in maintaining law and order and safeguarding society\'s interests. The procedures involved are governed by stringent rules to ensure fair trials and justice for both victims and the accused.',
                'points' => json_encode(['Criminal law addresses offenses like theft, assault, and fraud, ensuring justice through legal action and fair trials.', 'It covers investigation, prosecution, and defense in cases ranging from cybercrime to serious violence, upholding public safety.', 'This field maintains law and order by handling crimes against society while protecting the rights of both victims and accused.']),
                'what_we_provide' => json_encode(['Conciliation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'flag' => 'enabled', // New flag column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'icon' => 'fa-solid fa-gavel',
                'image_path' => 'assets/dynamic/practices/Criminal_Law.webp',
                'top_image' => 'assets/dynamic/practices/top_Criminal_Law.webp',
            ],
            [
                'practice_name' => 'Criminal Law',
                'para_sno' => 2,
                'title' => 'How can we help?',
                'para' => 'We provide expert defense strategies, represent clients during trials, assist with bail procedures, and handle appeals. For victims, we help pursue justice by ensuring offenders are prosecuted effectively. Our team handles complex criminal litigation, ensuring the rights of clients are protected at every stage of the legal process, from arrest to final judgment.',
                'points' => null,
                'what_we_provide' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'icon' => 'fa-solid fa-gavel',
                'image_path' => 'assets/dynamic/practices/Criminal_Law.webp',
                'top_image' => 'assets/dynamic/practices/top_Criminal_Law.webp',
            ],
            [
                'practice_name' => 'Private Firms',
                'para_sno' => 1,
                'title' => 'What is Private Firms?',
                'para' => 'Legal services for private firms cover company formation, mergers and acquisitions, intellectual property rights, contract negotiations, and compliance with corporate laws. This practice area ensures businesses operate within legal frameworks while fostering growth and innovation. It also involves advising firms on employment laws, data protection regulations, and dispute resolution mechanisms. The success of private firms often depends on strategic legal planning that minimizes risks and ensures operational efficiency. Legal compliance is crucial in avoiding penalties and maintaining the firm\'s reputation in a competitive market.',
                'points' => json_encode(['Legal services for private firms support business setup, contracts, compliance, and risk management to ensure smooth operations.', 'This area guides companies through corporate laws, mergers, IP protection, and dispute resolution for sustainable growth.', 'Strong legal planning helps private firms stay compliant, avoid penalties, and thrive in a competitive business environment.']),
                'what_we_provide' => json_encode(['Arbitration', 'Conciliation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'flag' => 'enabled', // New flag column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'icon' => 'fa-solid fa-gavel',
                'image_path' => 'assets/dynamic/practices/Private_firm.webp',
                'top_image' => 'assets/dynamic/practices/top_Private_firm.webp',
            ],
            [
                'practice_name' => 'Private Firms',
                'para_sno' => 2,
                'title' => 'How can we help?',
                'para' => 'Our firm offers comprehensive legal support, from drafting contracts and handling negotiations to advising on corporate governance, ensuring your firm operates efficiently and lawfully. We help manage legal risks, protect intellectual property, and assist with regulatory filings, enabling your business to grow without legal hindrances. Our goal is to provide tailored legal solutions that align with your business objectives.',
                'points' => null,
                'what_we_provide' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'icon' => 'fa-solid fa-gavel',
                'image_path' => 'assets/dynamic/practices/Private_firm.webp',
                'top_image' => 'assets/dynamic/practices/top_Private_firm.webp',
            ],
            [
                'practice_name' => 'Civil Law',
                'para_sno' => 1,
                'title' => 'What is Civil Law?',
                'para' => 'Civil law addresses non-criminal disputes, including property issues, family law matters, contracts, tort claims, and succession planning. It primarily deals with compensation and dispute resolution between individuals, organizations, or both. Civil law plays a vital role in maintaining peaceful relationships within society by providing mechanisms for resolving disputes amicably or through the courts. It encompasses areas such as divorce, child custody, wills and inheritance, landlord-tenant disputes, and breach of contract cases. Civil cases often involve negotiations, settlements, and court proceedings aimed at restoring rights or compensating for losses.',
                'points' => json_encode(['Civil law resolves private disputes like divorce, contracts, and property issues through legal remedies and fair compensation.', 'It focuses on non-criminal conflicts, helping individuals and organizations settle matters such as custody, inheritance, and agreements.', 'By addressing everyday legal concerns peacefully, civil law maintains societal harmony and protects individual rights.']),
                'what_we_provide' => json_encode(['Arbitration', 'Conciliation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'flag' => 'enabled', // New flag column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'icon' => 'fa-solid fa-gavel',
                'image_path' => 'assets/dynamic/practices/Civil_Law.webp',
                'top_image' => 'assets/dynamic/practices/top_Civil_Law.webp',
            ],
            [
                'practice_name' => 'Civil Law',
                'para_sno' => 2,
                'title' => 'How can we help?',
                'para' => 'We help by representing clients in court, drafting legal documents, and offering alternative dispute resolution methods like mediation and arbitration to settle civil matters swiftly and effectively. Our experienced team ensures that your rights are protected, providing personalized strategies to resolve disputes with minimal stress and expense. We are committed to securing favorable outcomes that meet your needs while avoiding prolonged litigation wherever possible.',
                'points' => null,
                'what_we_provide' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'icon' => 'fa-solid fa-gavel',
                'image_path' => 'assets/dynamic/practices/Civil_Law.webp',
                'top_image' => 'assets/dynamic/practices/top_Civil_Law.webp',
            ],
            [
                'practice_name' => 'Real Estate & Construction',
                'para_sno' => 1,
                'title' => 'What is Real Estate & Construction?',
                'para' => 'This practice covers legal aspects of property transactions, construction contracts, land use regulations, and real estate disputes. It ensures compliance with zoning laws, building codes, and environmental regulations. The sector also deals with residential and commercial property development, leasing agreements, financing arrangements, and joint ventures. Legal support in this area is essential to mitigate risks related to property ownership, land acquisition, construction delays, and contractual disputes. With increasing urbanization and infrastructure development, real estate and construction law plays a pivotal role in shaping the built environment.',
                'points' => json_encode(['Real estate and construction law handles property deals, contracts, and disputes, ensuring legal safety in development and ownership.', 'It covers everything from land use and zoning to lease agreements and construction delays, reducing risks in the building sector.', 'With urban growth on the rise, this law ensures smooth, lawful property transactions and compliance in real estate projects.']),
                'what_we_provide' => json_encode(['Arbitration', 'Conciliation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'flag' => 'enabled', // New flag column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'icon' => 'fa-solid fa-gavel',
                'image_path' => 'assets/dynamic/practices/Real_Estate_Construction.webp',
                'top_image' => 'assets/dynamic/practices/top_Real_Estate_Construction.webp',
            ],
            [
                'practice_name' => 'Real Estate & Construction',
                'para_sno' => 2,
                'title' => 'How can we help?',
                'para' => 'We provide legal advice on property acquisitions, draft construction contracts, resolve real estate disputes, and ensure regulatory compliance for smooth property dealings and project completions. Our firm assists developers, investors, and homeowners in navigating complex real estate regulations, securing project approvals, and handling litigation related to property ownership or construction delays. We are dedicated to safeguarding your real estate investments and ensuring successful project outcomes.',
                'points' => null,
                'what_we_provide' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'icon' => 'fa-solid fa-gavel',
                'image_path' => 'assets/dynamic/practices/Real_Estate_Construction.webp',
                'top_image' => 'assets/dynamic/practices/top_Real_Estate_Construction.webp',
            ],
            [
                'practice_name' => 'Consumer Forums',
                'para_sno' => 1,
                'title' => 'What is Consumer Forums?',
                'para' => 'Consumer law protects buyers against unfair trade practices, defective products, and deficient services. Consumer forums handle disputes related to product liability, service deficiencies, misleading advertisements, and fraudulent practices. This area of law empowers consumers by providing quick and cost-effective remedies. The Consumer Protection Act ensures that businesses adhere to quality standards and ethical practices while providing avenues for redressal in case of grievances. Consumer forums address issues ranging from defective goods and delayed services to overcharging and unsafe products, ensuring accountability in the market.',
                'points' => json_encode(['Consumer forums safeguard buyers by resolving disputes over faulty products, poor services, and deceptive business practices.', 'They offer fast, affordable legal help for issues like product defects, overcharging, and misleading ads, ensuring market fairness.', 'Consumer law empowers individuals with rights and remedies against unethical trade, holding businesses accountable for their actions.']),
                'what_we_provide' => json_encode(['Conciliation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'flag' => 'enabled', // New flag column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'icon' => 'fa-solid fa-gavel',
                'image_path' => 'assets/dynamic/practices/Consumer_Firm.webp',
                'top_image' => 'assets/dynamic/practices/top_Consumer_Firm.webp',
            ],

            [
                'practice_name' => 'Consumer Forums',
                'para_sno' => 2,
                'title' => 'How can we help?',
                'para' => 'Our firm assists clients in filing consumer complaints, representing them before consumer forums, and ensuring that their rights are protected against unfair practices through swift legal action. We handle cases related to defective products, delayed possessions, and deficient services, striving for quick resolutions and adequate compensation. Our goal is to ensure that consumers receive justice without the need for prolonged litigation, upholding fair market practices and consumer rights.',
                'points' => null,
                'what_we_provide' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'icon' => 'fa-solid fa-gavel',
                'image_path' => 'assets/dynamic/practices/Consumer_Firm.webp',
                'top_image' => 'assets/dynamic/practices/top_Consumer_Firm.webp',
            ],
        ];

        DB::table('practices')->insert($practices);
    }
}
