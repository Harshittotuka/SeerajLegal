<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            [
                'service_name' => 'Conciliation',
                'para_sno' => 1,
                'title' => 'What is Conciliation?',
                'para' => 'Conciliation is a method of alternative dispute resolution (ADR) where a neutral third party, called the conciliator, helps disputing parties to reach a mutually acceptable settlement.',
                'points' =>null,
                'rules' => null,
                'flag' => 'enabled', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
  [
                'service_name' => 'Conciliation',
                'para_sno' => 2,
                'title' => null,
                'para' => 'The conciliator plays a more proactive role than in mediation but does not impose a binding decision.Conciliation is often used in commercial, labor, and family disputes.',
                'points' => json_encode([
'Conciliation is a voluntary process where a neutral conciliator assists in resolving disputes.',
'Unlike arbitration, it is non-binding, and parties decide whether to accept the proposed solutions.',
'It promotes cooperation and is widely used in workplace, business, and personal conflicts.'
                ])
            ,
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
               [ 'service_name' => 'Conciliation',
                'para_sno' => 3,
                'title' => 'Our Role in Conciliation: How We Can Help You as Conciliators',
                'para' => 'As conciliators, we act as neutral facilitators to assist parties in resolving their disputes amicably. Here’s how we can help you throughout the conciliation process.',
                'points' => null,
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Conciliation',
                'para_sno' => 4,
                'title' => 'Explaining the Conciliation Process',
                'para' => null,
                'points' => json_encode([
'We guide you through the conciliation process, ensuring you understand its benefits, limitations, and how it differs from other dispute resolution methods like arbitration or litigation.',
                    'We create an environment that encourages open dialogue and constructive discussions.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Conciliation',
                'para_sno' => 5,
                'title' => 'Clarifying Positions and Interests',
                'para' => null,
                'points' => json_encode([
'We help both parties identify the key issues, interests, and priorities that need to be addressed for a resolution.',
                    'By understanding each party’s perspective, we ensure that discussions remain focused and productive.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Conciliation',
                'para_sno' => 6,
                'title' => 'Facilitating Discussions',
                'para' => null,
                'points' => json_encode([
'During conciliation meetings, we facilitate conversations in a fair and balanced manner, ensuring that both parties have an equal opportunity to present their case.',
                    'We offer impartial suggestions and options for resolving the dispute while maintaining neutrality.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Conciliation',
                'para_sno' => 7,
                'title' => 'Evaluating Settlement Options',
                'para' => null,
                'points' => json_encode([
'We assist in analyzing and clarifying the terms of proposed settlements to ensure they address the needs of all parties.',
                    'We help you evaluate the practicality and fairness of the conciliator’s suggestions while keeping your goals in mind.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],  [
                'service_name' => 'Arbitration',
                'para_sno' => 1,
                'title' => 'What is Arbitration?',
                'para' => 'Arbitration is a form of alternative dispute resolution (ADR) used to resolve disputes outside of court. It involves parties in a dispute agreeing to present their case to a neutral third party, known as an arbitrator, who hears the arguments and evidence and makes a binding decision.',
                'points' =>null,
                'rules' => null,
                'flag' => 'enabled', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
[
                'service_name' => 'Arbitration',
                'para_sno' => 2,
                'title' => null,
                'para' => null,
                'points' => json_encode([
                    'Arbitration is a legal process where a neutral arbitrator resolves disputes outside court.',
                    'The arbitrator hears both sides and makes a binding decision.',
                    'It is commonly used in commercial, contractual, and trade disputes.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ]
,


            [
                'service_name' => 'Arbitration',
                'para_sno' => 3,
                'title' => 'Our Role in Arbitration: How We Can Help You as Arbitrators',
                'para' => 'As arbitrators, our primary responsibility is to act as neutral decision-makers in the arbitration process, ensuring a fair, impartial, and efficient resolution to your dispute. Here’s how we can assist you:',
                'points' => null,
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Arbitration',
                'para_sno' => 4,
                'title' => 'Explaining the Arbitration Process',
                'para' => null,
                'points' => json_encode([
'We will guide you through the arbitration process, ensuring you understand the procedures, timelines, and what to expect at each stage.',
                    'We ensure that the arbitration is conducted in compliance with the terms of the arbitration agreement and relevant laws.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Arbitration',
                'para_sno' => 5,
                'title' => 'Managing Arbitration Agreements',
                'para' => null,
                'points' => json_encode([
'We ensure that the arbitration clauses and agreements are applied fairly and in line with legal standards.',
                    'We verify the scope of the arbitration, ensuring only the issues agreed upon by the parties are addressed.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Arbitration',
                'para_sno' => 6,
                'title' => 'Conducting Fair Hearings',
                'para' => null,
                'points' => json_encode([
'As arbitrators, we manage the arbitration proceedings, ensuring both parties are given equal opportunities to present their cases.',
                    'We maintain neutrality, allowing for a balanced presentation of arguments, evidence, and witness testimony.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Arbitration',
                'para_sno' => 7,
                'title' => 'Reviewing Submissions and Evidence',
                'para' =>null,
                'points' => json_encode([
 'We carefully analyze the pleadings, statements of claim or defense, and supporting evidence submitted by both parties.',
                    'We may request additional clarifications or evidence where necessary to ensure a comprehensive understanding of the dispute.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Arbitration',
                'para_sno' => 8,
                'title' => 'Facilitating Settlement (if Applicable)',
                'para' => null,
                'points' => json_encode([
'If both parties express a willingness to settle during the arbitration process, we can facilitate negotiations to help them reach a mutually acceptable resolution.',
                    'In case a settlement is reached, we ensure it is documented properly and enforceable under the law.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Arbitration',
                'para_sno' => 9,
                'title' => 'Issuing an Award',
                'para' => null,
                'points' => json_encode([
'After hearing both parties and analyzing all evidence, we issue a binding arbitration award based on the merits of the case and applicable laws.',
'Our award is final and enforceable, providing a conclusive resolution to the dispute.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Arbitration',
                'para_sno' => 10,
                'title' => 'Post-Award Support',
                'para' => null,
                'points' => json_encode([
'If requested, we can provide clarity on the reasoning behind the award.',
                    'In case of challenges to the award, we ensure that the arbitration record reflects a fair and lawful process.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Lok Adalat',
                'para_sno' => 1,
                'title' => 'What is Lok Adalat?',
                'para' => "Lok Adalat (translated as 'People's Court') is a statutory forum in India that provides an alternative dispute resolution mechanism for resolving cases amicably.",
                'points' => null,
                'rules' => null,
                'flag' => 'enabled', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Lok Adalat',
                'para_sno' => 2,
                'title' => null,
                'para' => "It is governed by the Legal Services Authorities Act, 1987, and is part of the Alternative Dispute Resolution (ADR) framework. Lok Adalats are organized by Legal Services Authorities at various levels (State, District, and Taluk).",
                'points' => json_encode([
                    'Decisions made in Lok Adalat hold the same legal status as a civil court decree.',
                    'It handles cases like matrimonial, financial, and public utility disputes through mutual settlement.',
                    'Lok Adalat is a cost-effective forum for resolving disputes outside regular courts.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],


        [
                'service_name' =>'Lok Adalat',
                'para_sno' => 3,
                'title' => 'Our Role in Lok Adalat: How We Can Help You',
                'para' => 'As facilitators in Lok Adalat, we ensure that disputes are resolved amicably, fairly, and efficiently. Our focus is on helping both parties reach a mutually acceptable solution while reducing the burden of litigation.',
                'points' => null,
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Lok Adalat',
                'para_sno' => 4,
                'title' => 'Explaining the Lok Adalat Process',
                'para' => null,
                'points' => json_encode([
'We will guide you through the Lok Adalat framework, including its structure, procedure, and advantages over traditional litigation.',
                    'We help you understand the types of cases eligible for Lok Adalat and the binding nature of its awards.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Lok Adalat',
                'para_sno' => 5,
                'title' => 'Encouraging Mutual Resolution',
                'para' => null,
                'points' => json_encode([
'We create a collaborative environment where both parties can openly discuss their issues.',
                    'We help identify common ground and promote fair compromise to resolve disputes amicably.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Lok Adalat',
                'para_sno' => 6,
                'title' => 'Clarifying Legal Rights and Obligations',
                'para' => null,
                'points' => json_encode([
'We ensure you are aware of your legal rights, obligations, and the potential outcomes of the dispute.',
                    'We provide clarity on how settling through Lok Adalat can be beneficial, saving time and resources.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Lok Adalat',
                'para_sno' => 7,
                'title' => 'Facilitating Discussions',
                'para' => null,
                'points' => json_encode([
'We mediate between the disputing parties, ensuring a constructive and balanced discussion.',
                    'Our role is to ensure both sides are heard and that the discussions remain focused on resolving the matter.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Lok Adalat',
                'para_sno' => 8,
                'title' => 'Drafting and Finalizing the Settlement',
                'para' => null,
                'points' => json_encode([
'We ensure that the settlement terms agreed upon are fair, reasonable, and enforceable.',
                    'The settlement award is documented as per legal standards and made binding on both parties.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Lok Adalat',
                'para_sno' => 8,
                'title' => 'Post-Lok Adalat Support',
                'para' => null,
                'points' => json_encode([
'If a settlement is not reached, we provide guidance on alternative dispute resolution methods, such as mediation or arbitration, or pursuing the case through traditional litigation.',
                    'We ensure that all processes in Lok Adalat are conducted transparently and with mutual respect.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],  [
                'service_name' => 'Negotiation',
                'para_sno' => 1,
                'title' => 'What is Negotiation?',
                'para' => 'Negotiation is a key method of Alternative Dispute Resolution (ADR) in the legal field. It involves direct discussions between two or more parties with the goal of reaching a mutually acceptable agreement without resorting to formal litigation, arbitration, or other dispute resolution mechanisms.',
                'points' => json_encode([
                    'Negotiation is a flexible process where parties resolve disputes through direct discussion.',
                    'It allows parties to control outcomes without involving a third party.',
                    'Used in legal, business, and personal conflicts, it promotes mutually beneficial agreements.' ])
               ,
                'rules' => null,
                'flag' => 'enabled', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Negotiation',
                'para_sno' => 2,
                'title' => 'Our Role in Negotiation: How We Can Help You',
                'para' => 'As negotiators, we act as facilitators to help you reach an agreement that satisfies your needs and interests. Here’s how we can assist you throughout the negotiation process:',
                'points' => null,
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Negotiation',
                'para_sno' => 3,
                'title' => 'Explaining the Negotiation Process',
                'para' => null,
                'points' => json_encode([
'We will walk you through the negotiation process, helping you understand the key steps, the importance of preparation, and the benefits of negotiation over other methods like litigation or arbitration.',
                    'We ensure that you are aware of the goals and strategies that can lead to a successful outcome.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Negotiation',
                'para_sno' => 4,
                'title' => 'Preparation for Negotiation',
                'para' => null,
                'points' => json_encode([
'We help you define your objectives, identify the issues at stake, and understand the needs and interests of the other party.',
                    'We assist in developing negotiation strategies and tactics to maximize your chances of achieving a favorable outcome.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Negotiation',
                'para_sno' => 5,
                'title' => 'Facilitating Discussions',
                'para' => null,
                'points' => json_encode([
'During the negotiation, we guide both parties to engage in constructive, solution-oriented conversations.',
                    'We help create a balanced, respectful environment where both parties feel heard and understood.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Negotiation',
                'para_sno' => 6,
                'title' => 'Identifying Interests and Building Solutions',
                'para' => null,
                'points' => json_encode([
'We work with you to uncover underlying interests and concerns that may not be immediately apparent.',
                    'We help brainstorm mutually beneficial solutions and compromise points that satisfy both parties.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Negotiation',
                'para_sno' => 7,
                'title' => 'Reviewing and Finalizing Agreements',
                'para' =>null,
                'points' => json_encode([
 'Once an agreement is reached, we ensure that the terms are clear, fair, and legally sound.',
                    'We help document the agreement, making sure it reflects the negotiated terms and is enforceable.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Negotiation',
                'para_sno' => 8,
                'title' => 'Post-Negotiation Support',
                'para' => null,
                'points' => json_encode([
'If the negotiation is unsuccessful, we provide guidance on alternative dispute resolution methods such as mediation or arbitration.',
 'We ensure that any agreements are properly implemented and assist in resolving any issues that may arise post-negotiation.'
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
                'icon'=>'fa-s',
            ], [
                'service_name' => 'Mediation',
                'para_sno' => 1,
                'title' => 'What is Mediation?',
                'para' => 'Mediation is another form of ADR where a neutral third party, called a mediator, facilitates discussions between disputing parties to help them reach a mutually acceptable resolution.',
                'points' =>null,
                'rules' => null,
                'flag' => 'enabled', // New flag column
                'created_at' => now(),
                'updated_at' => now(),
                'icon'=>'fa-s',
            ],
[
                'service_name' => 'Mediation',
                'para_sno' => 2,
                'title' => 'What is Mediation?',
                'para' => 'Unlike conciliation, the mediator does not suggest solutions or take a proactive role in resolving the dispute—they focus on fostering communication and collaboration between the parties.',
                'points' => json_encode([
                    'Mediation is voluntary, helping parties reach a mutual agreement.',
                    'The mediator facilitates discussion but does not impose solutions.',
                    'It fosters communication to maintain relationships and resolve disputes.',
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => now(),
                'updated_at' => now(),
                'icon'=>'fa-s',
           
            ],
            [
                'service_name' => 'Mediation',
                'para_sno' => 3,
                'title' => 'Role in Mediation: How We Can Help You as Mediators',
                'para' => 'As mediators, our primary role is to facilitate effective communication between the disputing parties and guide them toward a mutually acceptable resolution. Here is how we can assist you:',
                'points' => null,
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => now(),
                'updated_at' => now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Mediation',
                'para_sno' => 4,
                'title' => 'Advising You',
                'para' =>null,
                'points' => json_encode([
 'We will explain the mediation process in detail, including the steps involved and potential outcomes, to help you feel prepared and confident.',
                    'We will provide insights into legal and practical aspects of the dispute, ensuring you understand the negotiable points and what’s achievable.',
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => now(),
                'updated_at' => now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Mediation',
                'para_sno' => 5,
                'title' => 'Preparation for Mediation',
                'para' => null,
                'points' => json_encode([
'We will work with you to identify the key issues at hand, your interests, and potential solutions that can be explored.',
                    'We will help you anticipate the other party’s arguments and prepare strategies to effectively present your position.',
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => now(),
                'updated_at' => now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Mediation',
                'para_sno' => 6,
                'title' => 'Active Participation',
                'para' => null,
                'points' => json_encode([
'During mediation sessions, we will guide and support you in expressing your concerns and interests clearly.',
                    'We will ensure that the discussions remain constructive, and we will help both parties work toward favorable and realistic terms.',
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => now(),
                'updated_at' => now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Mediation',
                'para_sno' => 7,
                'title' => 'Settlement Drafting and Review',
                'para' => null,
                'points' => json_encode([
'Once an agreement is reached, we will ensure that the settlement aligns with your goals and interests.',
                    'We will assist in drafting a clear, enforceable agreement that satisfies both parties.',
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => now(),
                'updated_at' => now(),
                'icon'=>'fa-s',
            ],
            [
                'service_name' => 'Mediation',
                'para_sno' => 8,
                'title' => 'Post-Mediation Support',
                'para' => null,
                'points' => json_encode([
'If the mediation does not result in a resolution, we can advise you on alternative options, such as arbitration or litigation.',
                    'We will provide guidance on the next steps to ensure that your rights and interests are protected.',
                ]),
                'rules' => null,
                'flag' => 'null', // New flag column
                'created_at' => now(),
                'updated_at' => now(),
                'icon'=>'fa-s',
            ]
            ]);
        }
    }

