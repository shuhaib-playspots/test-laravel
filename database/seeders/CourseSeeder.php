<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'name'        => 'Quran Recitation (Nazra)',
                'slug'        => 'quran-recitation',
                'tagline'     => 'Learn to read the Holy Quran with beauty and confidence',
                'description' => 'Our Quran Recitation programme is the foundation of every child\'s Islamic education. Students learn to read Arabic letters, form words, and recite the Quran fluently. The course builds from the very first letter to smooth, confident Quran reading. Every lesson is guided by a qualified Ustadh who gives individual attention and ensures correct pronunciation from day one.',
                'icon'        => 'quran',
                'level'       => 'All Levels',
                'duration'    => 'Ongoing',
                'age_group'   => '5+ Years',
                'class_types' => ['one_on_one', 'group', 'online'],
                'highlights'  => [
                    'Arabic letter recognition and sounds',
                    'Joining letters and forming words',
                    'Fluent Quran reading from start to finish',
                    'Regular progress assessments',
                    'Personalised one-on-one attention',
                    'Parent progress reports every month',
                ],
                'order'       => 1,
            ],
            [
                'name'        => 'Hifz ul Quran (Memorisation)',
                'slug'        => 'hifz-ul-quran',
                'tagline'     => 'Carry the words of Allah in your heart — forever',
                'description' => 'The Hifz programme is one of the most honoured journeys a Muslim can take. Our structured Hifz curriculum guides students through the complete memorisation of the Quran in a caring and motivating environment. Our Ustadhs use proven memorisation techniques, daily revision systems, and regular testing to ensure every verse is retained firmly and with correct Tajweed.',
                'icon'        => 'hifz',
                'level'       => 'Intermediate',
                'duration'    => '2–5 Years',
                'age_group'   => '7+ Years',
                'class_types' => ['one_on_one', 'online'],
                'highlights'  => [
                    'Structured daily new lesson (sabaq) system',
                    'Revision (manzil) scheduling for retention',
                    'Tajweed integrated throughout memorisation',
                    'Monthly milestone tracking and celebration',
                    'Dedicated Hifz Ustadh for each student',
                    'Flexible pace tailored to every child',
                ],
                'order'       => 2,
            ],
            [
                'name'        => 'Tajweed',
                'slug'        => 'tajweed',
                'tagline'     => 'Recite the Quran the way it was revealed — perfectly',
                'description' => 'Tajweed is the science of reciting the Quran correctly — giving every letter its right and observing the rules of pronunciation, elongation, and stopping. Our Tajweed course takes students from the basic rules (Makhaarij) through to advanced Tajweed application, producing beautiful, accurate Quran recitation that fulfils the command of Allah to recite the Quran with care.',
                'icon'        => 'tajweed',
                'level'       => 'Beginner to Advanced',
                'duration'    => '6–12 Months',
                'age_group'   => '8+ Years',
                'class_types' => ['one_on_one', 'group', 'online'],
                'highlights'  => [
                    'Makhaarij al-Huroof (articulation points)',
                    'Sifaat al-Huroof (letter characteristics)',
                    'Rules of Noon Saakinah and Tanween',
                    'Rules of Meem Saakinah',
                    'Madd (elongation) rules and types',
                    'Waqf and Ibtida (stopping and starting)',
                ],
                'order'       => 3,
            ],
            [
                'name'        => 'Arabic Language',
                'slug'        => 'arabic-language',
                'tagline'     => 'Understand and speak the language of the Quran',
                'description' => 'Arabic is the language Allah chose for His final revelation. Our Arabic Language programme teaches children to read, understand, write, and speak Arabic confidently. Starting from the alphabet and building to conversational and Quranic Arabic, students develop a love for the language that deepens their connection to the Quran and Islamic texts. Classes are fun, interactive, and designed for young minds.',
                'icon'        => 'arabic',
                'level'       => 'Beginner to Intermediate',
                'duration'    => '12 Months',
                'age_group'   => '6+ Years',
                'class_types' => ['group', 'online'],
                'highlights'  => [
                    'Arabic alphabet and vowels (Harakat)',
                    'Vocabulary building through games and activities',
                    'Basic Arabic grammar (Nahw) foundations',
                    'Quranic Arabic vocabulary and meanings',
                    'Simple Arabic conversation and sentences',
                    'Reading and comprehension of short texts',
                ],
                'order'       => 4,
            ],
            [
                'name'        => 'Islamic Studies',
                'slug'        => 'islamic-studies',
                'tagline'     => 'Build a strong, confident Islamic identity',
                'description' => 'Islamic Studies is a comprehensive programme covering the core knowledge every Muslim child needs: Aqeedah (belief), Fiqh (jurisprudence), Seerah (Prophetic biography), Islamic history, and everyday Islamic practice. Lessons are engaging, age-appropriate, and rooted in the Quran and authentic Sunnah. Students graduate with the knowledge and confidence to live and practise Islam fully in modern life.',
                'icon'        => 'islamic-studies',
                'level'       => 'All Levels',
                'duration'    => 'Ongoing',
                'age_group'   => '6+ Years',
                'class_types' => ['group', 'online'],
                'highlights'  => [
                    'Aqeedah — pillars of faith and Islamic belief',
                    'Fiqh — prayer, fasting, Zakat and daily worship',
                    'Seerah — the life of the Prophet ﷺ',
                    'Islamic history from the Sahaabah to today',
                    'Halal and Haram in everyday life',
                    'Character building through Islamic principles',
                ],
                'order'       => 5,
            ],
            [
                'name'        => 'Duas & Adhkar',
                'slug'        => 'duas-adhkar',
                'tagline'     => 'Fill your child\'s heart and tongue with the remembrance of Allah',
                'description' => 'Duas & Adhkar is a beautiful course that teaches children the essential daily supplications — morning and evening Adhkar, duas for eating, sleeping, travelling, entering the masjid, and much more. Memorising and understanding these duas connects children to Allah in their daily life and gives them spiritual protection. This is often a child\'s favourite class because they can immediately use what they learn every day.',
                'icon'        => 'dua',
                'level'       => 'Beginner',
                'duration'    => '3 Months',
                'age_group'   => '4+ Years',
                'class_types' => ['group', 'online'],
                'highlights'  => [
                    'Morning and evening Adhkar',
                    'Duas for daily activities (eating, sleeping, travel)',
                    'Duas from the Quran and authentic Sunnah',
                    'Understanding the meanings of each dua',
                    'Fun memorisation through repetition and songs',
                    'Immediate daily practice and application',
                ],
                'order'       => 6,
            ],
            [
                'name'        => 'Islamic Manners (Akhlaq)',
                'slug'        => 'akhlaq',
                'tagline'     => 'Raise a child of beautiful character — the way of the Prophet ﷺ',
                'description' => 'Akhlaq — Islamic manners and character — is at the heart of everything we do at Nabaath. This dedicated programme teaches children the beautiful manners of the Prophet Muhammad ﷺ: honesty, kindness, respect, gratitude, patience, and love for others. Through stories, role-play, and real-life scenarios, children internalise these values and carry them into their homes, schools, and communities.',
                'icon'        => 'akhlaq',
                'level'       => 'All Levels',
                'duration'    => '6 Months',
                'age_group'   => '5+ Years',
                'class_types' => ['group', 'online'],
                'highlights'  => [
                    'Manners with parents, teachers, and elders',
                    'Honesty, trust, and keeping promises',
                    'Kindness to siblings, friends, and neighbours',
                    'Respect for the masjid and sacred knowledge',
                    'Gratitude, patience, and contentment',
                    'Islamic etiquette for eating, greetings, and visits',
                ],
                'order'       => 7,
            ],
        ];

        foreach ($courses as $data) {
            Course::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
