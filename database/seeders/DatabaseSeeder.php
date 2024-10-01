<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin@admin.com'),
                'is_admin' => 1
            ]
        );




        Quiz::factory()->count(200)->state(new Sequence(
            [
                "owner_id"=>1,

                "category" => "Geography",
                "question" => "Which is the world&#039;s longest river?",
                "correct_answer" => "Nile",
                "incorrect_answers" => json_encode(["Missouri", "Amazon", "Yangtze"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What is the capital of Indonesia?",
                "correct_answer" => "Jakarta",
                "incorrect_answers" => json_encode(["Bandung", "Medan", "Palembang"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Geography",
                "question" => "What is the largest Muslim country in the world?",
                "correct_answer" => "Indonesia",
                "incorrect_answers" => json_encode(["Pakistan", "Saudi Arabia", "Iran"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What continent is the country Lesotho in?",
                "correct_answer" => "Africa",
                "incorrect_answers" => json_encode(["Asia", "South America", "Europe"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Geography",
                "question" => "Tokyo is the capital of Japan.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "Which of the following Inuit languages was the FIRST to use a unique writing system not based on the Latin alphabet?",
                "correct_answer" => "Inuktitut",
                "incorrect_answers" => json_encode(["Inuinnaqtun", "Greenlandic", "Inupiat"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What is the smallest country in the world?",
                "correct_answer" => "Vatican City",
                "incorrect_answers" => json_encode(["Maldives", "Monaco", "Malta"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What is Canada&#039;s smallest province?",
                "correct_answer" => "Prince Edward Island",
                "incorrect_answers" => json_encode(["New Brunswick", "Nova Scotia", "Yukon"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "The body of the Egyptian Sphinx was based on which animal?",
                "correct_answer" => "Lion",
                "incorrect_answers" => json_encode(["Bull", "Horse", "Dog"]),
            ],
            [
                "owner_id" => 1,
                "category" => "Geography",
                "question" => "There are no deserts in Europe.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "What is the land connecting North America and South America?",
                "correct_answer" => "Isthmus of Panama",
                "incorrect_answers" => json_encode(["Isthmus of Suez", "Urals", "Australasia"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "Llanfair&shy;pwllgwyngyll&shy;gogery&shy;chwyrn&shy;drobwll&shy;llan&shy;tysilio&shy;gogo&shy;goch is located on which Welsh island?",
                "correct_answer" => "Anglesey",
                "incorrect_answers" => json_encode(["Barry", "Bardsey", "Caldey"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "Which country has the abbreviation &quot;CH&quot;?",
                "correct_answer" => "Switzerland",
                "incorrect_answers" => json_encode(["China", "Canada", "No Country"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Geography",
                "question" => "Norway has a larger land area than Sweden.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Geography",
                "question" =>
                    "The capital of the US State Ohio is the city of Chillicothe.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What is the second-largest city in Lithuania?",
                "correct_answer" => "Kaunas",
                "incorrect_answers" => json_encode([
                    "Panev\u0117\u017eys",
                    "Vilnius",
                    "Klaip\u0117da",
                ]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "What is the capital of the American state of Arizona?",
                "correct_answer" => "Phoenix",
                "incorrect_answers" => json_encode(["Montgomery", "Tallahassee", "Raleigh"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Geography",
                "question" => "Seoul is the capital of North Korea.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "How many countries does Spain have a land border with?",
                "correct_answer" => "5",
                "incorrect_answers" => json_encode(["2", "3", "4"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What is the 15th letter of the Greek alphabet?",
                "correct_answer" => "Omicron (&Omicron;)",
                "incorrect_answers" => json_encode([
                    "Sigma (&Sigma;)",
                    "Pi (&Pi;)",
                    "Nu (&Nu;)",
                ]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "What national museum will you find in Cooperstown, New York?",
                "correct_answer" => "National Baseball Hall of Fame",
                "incorrect_answers" => json_encode([
                    "Metropolitan Museum of Art",
                    "National Toy Hall of Fame",
                    "Museum of Modern Art",
                ]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "Which country is the Taedong River in?",
                "correct_answer" => "North Korea",
                "incorrect_answers" => json_encode(["South Korea", "Japan", "China"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Geography",
                "question" => "Israel is 7 hours ahead of New York.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "The emblem on the flag of the Republic of Tajikistan features a sunrise over mountains below what symbol?",
                "correct_answer" => "Crown",
                "incorrect_answers" => json_encode(["Bird", "Sickle", "Tree"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "Which European city has the highest mileage of canals in the world?",
                "correct_answer" => "Birmingham",
                "incorrect_answers" => json_encode(["Venice", "Amsterdam", "Berlin"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "The prefix Sino- (As in Sino-American) is used to refer to what nationality?",
                "correct_answer" => "Chinese",
                "incorrect_answers" => json_encode(["Japanese", "Russian", "Indian"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "The Alps are a mountain range on which continent?",
                "correct_answer" => "Europe",
                "incorrect_answers" => json_encode(["North America", "Asia", "Africa"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "Where is the fast food chain &quot;Panda Express&quot; headquartered?",
                "correct_answer" => "Rosemead, California",
                "incorrect_answers" => json_encode([
                    "Sacramento, California",
                    "Fresno, California",
                    "San Diego, California",
                ]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What is the largest country in the world ?",
                "correct_answer" => "Russian Federation",
                "incorrect_answers" => json_encode(["China", "Canada", "Brazil"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "Which of these countries is not a United Nations member state?",
                "correct_answer" => "Niue",
                "incorrect_answers" => json_encode(["Tuvalu", "South Sudan", "Montenegro"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Geography",
                "question" => "Alaska is the largest state in the United States.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "Colchester Overpass, otherwise known as &quot;Bunny Man Bridge&quot;, is located where?",
                "correct_answer" => "Fairfax County, Virginia",
                "incorrect_answers" => json_encode([
                    "Medford, Oregon",
                    "Braxton County, Virgina",
                    "Lemon Grove, California",
                ]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "How tall is One World Trade Center in New York City?",
                "correct_answer" => "1,776 ft",
                "incorrect_answers" => json_encode(["1,888 ft", "1,225 ft", "1,960 ft"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What is the Finnish word for &quot;Finland&quot;?",
                "correct_answer" => "Suomi",
                "incorrect_answers" => json_encode(["Eesti", "Magyarorsz&aacute;g", "Sverige"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "Which country is the home of the largest Japanese population outside of Japan?",
                "correct_answer" => "Brazil",
                "incorrect_answers" => json_encode(["China", "Russia", "The United States"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "What island in the Canary Islands was the scene of one of the worst air disasters in history with the collision of two jumbo jets?",
                "correct_answer" => "Tenerife",
                "incorrect_answers" => json_encode(["Fuerteventura", "Gran Canaria", "Maui"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What is the capital of Senegal?",
                "correct_answer" => "Dakar",
                "incorrect_answers" => json_encode(["Nouakchott", "Conakry", "Monrovia"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "Which two modern-day countries used to be known as the region of Rhodesia between the 1890s and 1980?",
                "correct_answer" => "Zambia &amp; Zimbabwe",
                "incorrect_answers" => json_encode([
                    "Togo &amp; Benin",
                    "Lesotho &amp; Swaziland",
                    "Rwanda &amp; Burundi",
                ]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What is the capital of Denmark?",
                "correct_answer" => "Copenhagen",
                "incorrect_answers" => json_encode(["Aarhus", "Odense", "Aalborg"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "Which is the largest city in Morocco?",
                "correct_answer" => "Casablanca",
                "incorrect_answers" => json_encode(["Rabat", "Fes", "Sale"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "Frankenmuth, a US city nicknamed &quot;Little Bavaria&quot;, is located in what state?",
                "correct_answer" => "Michigan",
                "incorrect_answers" => json_encode(["Pennsylvania", "Kentucky", "Virginia"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "The longest shared border in the world can be found between which two nations?",
                "correct_answer" => "Canada and the United States",
                "incorrect_answers" => json_encode([
                    "Chile and Argentina",
                    "Russia and China",
                    "India and Pakistan",
                ]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "What is the official German name of the Swiss Federal Railways?",
                "correct_answer" => "Schweizerische Bundesbahnen",
                "incorrect_answers" => json_encode([
                    "Schweizerische Nationalbahnen",
                    "Bundesbahnen der Schweiz",
                    "Schweizerische Staatsbahnen",
                ]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "Greenland is a part of which kingdom?",
                "correct_answer" => "Denmark",
                "incorrect_answers" => json_encode(["Sweden", "Norway", "United Kingdom"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "What is the name of the peninsula containing Spain and Portugal?",
                "correct_answer" => "Iberian Peninsula",
                "incorrect_answers" => json_encode([
                    "European Peninsula",
                    "Peloponnesian Peninsula",
                    "Scandinavian Peninsula",
                ]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What colour is the circle on the Japanese flag?",
                "correct_answer" => "Red",
                "incorrect_answers" => json_encode(["White", "Yellow", "Black"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "The Hunua Ranges is located in...",
                "correct_answer" => "New Zealand",
                "incorrect_answers" => json_encode(["Nepal", "China", "Mexico"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What is the capital of Scotland?",
                "correct_answer" => "Edinburgh",
                "incorrect_answers" => json_encode(["Glasgow", "Dundee", "London"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" =>
                    "What is the name of New Zealand&#039;s indigenous people?",
                "correct_answer" => "Maori",
                "incorrect_answers" => json_encode(["Vikings", "Polynesians", "Samoans"]),
            ],
            [
                "owner_id" => 1,


                "category" => "Geography",
                "question" => "What is the nickname for the US state Delaware?",
                "correct_answer" => "The First State",
                "incorrect_answers" => json_encode([
                    "The Fiftieth State",
                    "The Second State",
                    "The Sixteenth State",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" => "Which Greek god was the god of the Sun?",
                "correct_answer" => "Helios",
                "incorrect_answers" => json_encode(["Zeus", "Hades", "Poseidon"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "Who was the first man to travel into outer space twice?",
                "correct_answer" => "Gus Grissom",
                "incorrect_answers" => json_encode([
                    "Vladimir Komarov",
                    "Charles Conrad",
                    "Yuri Gagarin",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "The Tiananmen Square protests of 1989 were held in Hong Kong.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "Which of the following African countries was most successful in resisting colonization?",
                "correct_answer" => "Ethiopia",
                "incorrect_answers" => json_encode([
                    "C&ocirc;te d&rsquo;Ivoire",
                    "Congo",
                    "Namibia",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" => "Adolf Hitler was born on which date?",
                "correct_answer" => "April 20, 1889",
                "incorrect_answers" => json_encode([
                    "June 12, 1889",
                    "February 6, 1889",
                    "April 16, 1889",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "Who invented the &quot;Flying Shuttle&quot; in 1738; one of the key developments in the industrialization of weaving?",
                "correct_answer" => "John Kay",
                "incorrect_answers" => json_encode([
                    "James Hargreaves",
                    "Richard Arkwright",
                    "John Deere",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "What was the last colony the UK ceded marking the end of the British Empire?",
                "correct_answer" => "Hong Kong",
                "incorrect_answers" => json_encode(["India", "Australia", "Ireland"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "Which one of these tanks was designed and operated by the United Kingdom?",
                "correct_answer" => "Tog II",
                "incorrect_answers" => json_encode(["M4 Sherman", "Tiger H1", "T-34"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "What was Napoleon Bonaparte&#039;s name before he changed it?",
                "correct_answer" => "Napoleone di Buonaparte",
                "incorrect_answers" => json_encode([
                    "Naapolion van Bonijpaart",
                    "Napole&atilde;o do Boaparte",
                    "Napoleona de Buenoparte",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" => "What was William Frederick Cody better known as?",
                "correct_answer" => "Buffalo Bill",
                "incorrect_answers" => json_encode([
                    "Billy the Kid",
                    "Wild Bill Hickok",
                    "Pawnee Bill",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "Joseph Stalin&#039;s real name was Ioseb Bessarionis dze Dzugashvili.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "Abolitionist John Brown raided the arsenal in which Virginia Town?",
                "correct_answer" => "Harper&#039;s Ferry",
                "incorrect_answers" => json_encode(["Richmond", "Harrisonburg", "Martinsburg"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "The Panama Canal was finished under the administration of which U.S. president?",
                "correct_answer" => "Woodrow Wilson",
                "incorrect_answers" => json_encode([
                    "Franklin Delano Roosevelt",
                    "Herbert Hoover",
                    "Theodore Roosevelt",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "Which U.S. President was famously &#039;attacked&#039; by a swimming rabbit?",
                "correct_answer" => "Jimmy Carter",
                "incorrect_answers" => json_encode([
                    "Ronald Reagan",
                    "Lydon B. Johnson",
                    "Gerald Ford",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "When was the Grand Patriotic War in the USSR concluded?",
                "correct_answer" => "May 9th, 1945",
                "incorrect_answers" => json_encode([
                    "September 2nd, 1945",
                    "August 9th, 1945",
                    "December 11th, 1945",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "Who was the only US President to be elected four times?",
                "correct_answer" => "Franklin Roosevelt",
                "incorrect_answers" => json_encode([
                    "Theodore Roosevelt",
                    "George Washington",
                    "Abraham Lincoln",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "What disease crippled President Franklin D. Roosevelt and led him to help the nation find a cure? ",
                "correct_answer" => "Polio",
                "incorrect_answers" => json_encode(["Cancer", "Meningitis", "HIV"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "During which American Civil War campaign did Union troops dig a tunnel beneath Confederate troops to detonate explosives underneath them?",
                "correct_answer" => "Siege of Petersburg",
                "incorrect_answers" => json_encode([
                    "Siege of Vicksburg",
                    "Antietam Campaign",
                    "Gettysburg Campagin",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "The ontological argument for the proof of God&#039;s existence is first attributed to whom?",
                "correct_answer" => "Anselm of Canterbury",
                "incorrect_answers" => json_encode([
                    "Ren&eacute; Descartes",
                    "Immanuel Kant",
                    "Aristotle",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" => "In which year did the First World War begin?",
                "correct_answer" => "1914",
                "incorrect_answers" => json_encode(["1930", "1917", "1939"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "In World War I, what was the name of the alliance of Germany, Austria-Hungary, the Ottoman Empire, and Bulgaria?",
                "correct_answer" => "The Central Powers",
                "incorrect_answers" => json_encode([
                    "The Axis Powers",
                    "The Federation of Empires",
                    "Authoritarian Alliance",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "The &quot;Trail of Tears&quot; was a result of which United States President&#039;s Indian Removal Policy?",
                "correct_answer" => "Andrew Jackson",
                "incorrect_answers" => json_encode([
                    "Harry S. Truman",
                    "Martin Van Buren",
                    "John Quincy Adams",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "Which of the following is not in the Indo-European language family?",
                "correct_answer" => "Finnish",
                "incorrect_answers" => json_encode(["English", "Hindi", "Russian"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "What was the bloodiest single-day battle during the American Civil War?",
                "correct_answer" => "The Battle of Antietam",
                "incorrect_answers" => json_encode([
                    "The Siege of Vicksburg",
                    "The Battle of Gettysburg",
                    "The Battles of Chancellorsville",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "Which of these countries remained neutral during World War II?",
                "correct_answer" => "Switzerland",
                "incorrect_answers" => json_encode(["United Kingdom", "France", "Italy"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "If you grab the bladed end of a longsword in a specific way, you will not cut yourself.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" => "The Thirty Years War ended with which treaty?",
                "correct_answer" => "Peace of Westphalia",
                "incorrect_answers" => json_encode([
                    "Treaty of Versailles",
                    "Treaty of Paris",
                    "Peace of Prague",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "When did L. L. Zamenhof first publish &quot;Unua Libro&quot;, the first publication describing his international language Esperanto?",
                "correct_answer" => "1887",
                "incorrect_answers" => json_encode(["1897", "1905", "1915"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "The M41 Walker Bulldog remains in service in some countries to this day.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" => "How long did World War II last?",
                "correct_answer" => "6 years",
                "incorrect_answers" => json_encode(["4 years", "5 years", "7 years"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "One of the deadliest pandemics, the &quot;Spanish Flu&quot;, killed off what percentage of the human world population at the time?",
                "correct_answer" => "3 to 6 percent",
                "incorrect_answers" => json_encode([
                    "6 to 10 percent",
                    "1 to 3 percent",
                    "less than 1 percent",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "What is the bloodiest event in United States history, in terms of casualties?",
                "correct_answer" => "Battle of Antietam",
                "incorrect_answers" => json_encode(["Pearl Harbor", "September 11th", "D-Day"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "In 1967, a magazine published a story about extracting hallucinogenic chemicals from bananas to raise moral questions about banning drugs.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "Which of the following snipers has the highest amount of confirmed kills?",
                "correct_answer" => "Simo H&auml;yh&auml;",
                "incorrect_answers" => json_encode([
                    "Chris Kyle",
                    "Vasily Zaytsev",
                    "Craig Harrison",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "What did the abbreviation &quot;RMS&quot; stand for in the RMS Titanic in 1912?",
                "correct_answer" => "Royal Mail Ship",
                "incorrect_answers" => json_encode([
                    "Royal Majesty Service",
                    "Regular Maritime Schedule ",
                    "Regulated Maelstrom Sensor",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" => "How many manned moon landings have there been?",
                "correct_answer" => "6",
                "incorrect_answers" => json_encode(["1", "3", "7"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "What was the name commonly given to the ancient trade routes that connected the East and West of Eurasia?",
                "correct_answer" => "Silk Road",
                "incorrect_answers" => json_encode(["Spice Road", "Clay Road", "Salt Road"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "From 1940 to 1942, what was the capital-in-exile of Free France ?",
                "correct_answer" => "Brazzaville",
                "incorrect_answers" => json_encode(["Algiers", "Paris", "Tunis"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "The Hagia Sophia was commissioned by which emperor of the Byzantine Empire?",
                "correct_answer" => "Justinian I",
                "incorrect_answers" => json_encode([
                    "Constantine IV",
                    "Arcadius",
                    "Theodosius the Great",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" => "Bohdan Khmelnytsky was which of the following?",
                "correct_answer" => "Leader of the Ukrainian Cossacks",
                "incorrect_answers" => json_encode([
                    "General Secretary of the Communist Party of the USSR",
                    "Prince of Wallachia",
                    "Grand Prince of Novgorod",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" => "Brezhnev was the 5th leader of the USSR.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "In what year was the famous 45 foot tall Hollywood sign first erected?",
                "correct_answer" => "1923",
                "incorrect_answers" => json_encode(["1903", "1913", "1933"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "What was the name of the chemical that was dropped on Vietnam during the Vietnam war?",
                "correct_answer" => "Agent Orange",
                "incorrect_answers" => json_encode([
                    "Phosgene",
                    "Mustard Gas",
                    "Hydrogen Cyanide",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "What was the transfer of disease, crops, and people across the Atlantic shortly after the discovery of the Americas called?",
                "correct_answer" => "The Columbian Exchange",
                "incorrect_answers" => json_encode([
                    "Triangle Trade",
                    "Transatlantic Slave Trade",
                    "The Silk Road",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "In the year 1900, what were the most popular first names given to boy and girl babies born in the United States?",
                "correct_answer" => "John and Mary",
                "incorrect_answers" => json_encode([
                    "Joseph and Catherine",
                    "William and Elizabeth",
                    "George and Anne",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "In what year did the North American Video Game Crash occur?",
                "correct_answer" => "1983",
                "incorrect_answers" => json_encode(["1982", "1993", "1970"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" => "When did the Battle of the Somme begin?",
                "correct_answer" => "July 1st, 1916",
                "incorrect_answers" => json_encode([
                    "August 1st, 1916",
                    "July 2nd, 1916",
                    "June 30th, 1916",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "In 1720, England was in massive debt and became involved in the South Sea Bubble. Who was the main mastermind behind it?",
                "correct_answer" => "John Blunt",
                "incorrect_answers" => json_encode([
                    "Daniel Defoe",
                    "Robert Harley",
                    "John Churchill",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" =>
                    "The crown of the Empire State Building was originally built for what purpose?",
                "correct_answer" => "Airship Dock",
                "incorrect_answers" => json_encode(["Lightning Rod", "Antennae", "Flag Pole"]),
            ],
            [
                "owner_id" => 1,

                "category" => "History",
                "question" => "Which country was Josef Stalin born in?",
                "correct_answer" => "Georgia",
                "incorrect_answers" => json_encode(["Russia", "Germany", "Poland"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "Who is the main character in the video game &quot;Just Cause 3&quot;?",
                "correct_answer" => "Rico Rodriguez",
                "incorrect_answers" => json_encode([
                    "Tom Sheldon",
                    "Marcus Holloway",
                    "Mario Frigo",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "There are 6 legendary cards in &quot;Clash Royale&quot;.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "The rights to the &quot;Rayman&quot; series are owned by which company?",
                "correct_answer" => "Ubisoft",
                "incorrect_answers" => json_encode(["Nintendo", "EA", "Sony"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" => "When was Final Fantasy XV released?",
                "correct_answer" => "November 29th, 2016",
                "incorrect_answers" => json_encode([
                    "October 25th, 2016",
                    "December 31th, 2016",
                    "November 30th, 2016",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In the Halo series, which era of SPARTAN is Master Chief? ",
                "correct_answer" => "SPARTAN-II",
                "incorrect_answers" => json_encode(["SPARTAN-I", "SPARTAN-III", "SPARTAN-IV"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" => "Which of these roles in Town of Salem is mafia?",
                "correct_answer" => "Disguiser",
                "incorrect_answers" => json_encode(["Escort", "Lookout", "Transporter"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In Splatoon, the Squid Sisters are named Tako and Yaki.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" => "When was &quot;System Shock&quot; released?",
                "correct_answer" => "1994",
                "incorrect_answers" => json_encode(["1995", "2000", "1998"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "&quot;Sonic the Hedgehog 2&quot; originally was going to have a time travel system.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In Five Nights at Freddy&#039;s 1, how can you make disappear Golden Freddy?",
                "correct_answer" => "Enable cameras",
                "incorrect_answers" => json_encode([
                    "Turn on the light",
                    "Shut the door",
                    "Do nothing",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In the Mass Effect trilogy, who is the main protagonist?",
                "correct_answer" => "Shepard",
                "incorrect_answers" => json_encode(["Mordin", "Garrus", "Thane"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In &quot;Team Fortress 2&quot;, how much health does a scout have when overhealed?",
                "correct_answer" => "185",
                "incorrect_answers" => json_encode(["215", "195", "225"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "What company created and developed the game &quot;Overwatch&quot;?",
                "correct_answer" => "Blizzard Entertainment",
                "incorrect_answers" => json_encode([
                    "Valve",
                    "Hi-Rez Studios",
                    "Gearbox Software",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In the Kingdom Heart series who provides the english voice for Master Eraqus?",
                "correct_answer" => "Mark Hamill",
                "incorrect_answers" => json_encode([
                    "Jason Dohring",
                    "Jesse McCartney",
                    "Haley Joel Osment",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "Which of these Counter-Strike maps is a bomb defuse scenario?",
                "correct_answer" => "Prodigy",
                "incorrect_answers" => json_encode(["747", "Havana", "Oilrig"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "What was Frank West&#039;s job in &quot;Dead Rising&quot;?",
                "correct_answer" => "Photojournalist",
                "incorrect_answers" => json_encode(["Janitor", "Chef", "Taxi Driver"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "Which football player is featured on the international cover version of the video game FIFA 16?",
                "correct_answer" => "Lionel Messi",
                "incorrect_answers" => json_encode([
                    "Cristiano Ronaldo",
                    "Wayne Rooney",
                    "David Beckham",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In the Super Mario series, the character Pauline is a Princess like Princess Peach.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" => "The Bracken from Lethal Company is also known as:",
                "correct_answer" => "The Flower Man",
                "incorrect_answers" => json_encode(["The Phantom", "The Shadow Demon", "Larry"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In the Team Fortress 2 canon, what did Shakespearicles NOT invent?",
                "correct_answer" => "Stairs",
                "incorrect_answers" => json_encode([
                    "Two-Story Building",
                    "Rocket Launcher",
                    "Stage Play",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "What is the perk that was introduced in the &quot;Call Of Duty: Zombies&quot; map, &quot;Mob Of The Dead&quot;?",
                "correct_answer" => "Electric Cherry",
                "incorrect_answers" => json_encode(["Quick Revive", "Vulture Aid", "Tombstone"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "Who is the main character in most of the games of the YS series?",
                "correct_answer" => "Adol Christin ",
                "incorrect_answers" => json_encode([
                    "Character doesn&#039;t have a name",
                    "Estelle Bright",
                    "Roger Wilco",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "Who is the villain company in &quot;Stardew Valley&quot;?",
                "correct_answer" => "Joja Co ",
                "incorrect_answers" => json_encode([
                    "Ronin",
                    "Empire",
                    "Robotnik Industry&#039;s ",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "Which of the following commercial vehicles from Grand Theft Auto IV did NOT reappear in Grand Theft Auto V?",
                "correct_answer" => "Steed",
                "incorrect_answers" => json_encode(["Mule", "Benson", "Pony"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "What was the code name for the &quot;Nintendo Gamecube&quot;?",
                "correct_answer" => "Dolphin",
                "incorrect_answers" => json_encode(["Nitro", "Revolution", "Atlantis"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In Fallout: New Vegas, upon starting each one of the four campaign DLCs, which one of them does not have a warning screen/recommended level? ",
                "correct_answer" => "Honest Hearts ",
                "incorrect_answers" => json_encode([
                    "Old World Blues",
                    "Lonesome Road",
                    "Dead Money",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "Which of the following was a map that was in Team Fortress 2 at launch?",
                "correct_answer" => "Gravel Pit",
                "incorrect_answers" => json_encode(["Hoodoo", "Gold Rush", "Upward"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "What minimum level in the Defence skill is needed to equip Dragon Armour in the MMO RuneScape?",
                "correct_answer" => "60",
                "incorrect_answers" => json_encode(["65", "55", "70"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In &quot;Resident Evil 2&quot;, what is Leon Kennedy&#039;s middle name?",
                "correct_answer" => "Scott",
                "incorrect_answers" => json_encode(["Shaun", "Simon", "Sam"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In the &quot;Call Of Duty: Zombies&quot; map &quot;Origins&quot;, where is &quot;Stamin-Up&quot; located?",
                "correct_answer" => "Generator 5",
                "incorrect_answers" => json_encode([
                    "Generator 3",
                    "Generator 4",
                    "Excavation Site",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "What is the hardest possible difficulty in &quot;Deus Ex: Mankind Divided&quot;?",
                "correct_answer" => "I Never Asked For This",
                "incorrect_answers" => json_encode(["Nightmare", "Extreme", "Guru"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "When Halo 3: ODST was unveiled in 2008, it had a different title. What was the game formally called?",
                "correct_answer" => "Halo 3: Recon",
                "incorrect_answers" => json_encode([
                    "Halo 3: Helljumpers",
                    "Halo 3: Phantom",
                    "Halo 3: Guerilla",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "What is the browser game Kantai Collection heavily inspired by?",
                "correct_answer" => "Second World War",
                "incorrect_answers" => json_encode(["Manga", "World of Warcraft", "An Anime"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In the beginning of the game &quot;Sonic Adventure&quot;, what color Chaos Emerald does Tails own?",
                "correct_answer" => "Purple",
                "incorrect_answers" => json_encode(["Red", "Green", "Blue"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "Who is the main villain of Kirby&#039;s Return to Dreamland?",
                "correct_answer" => "Magolor",
                "incorrect_answers" => json_encode(["Landia", "King Dedede", "Queen Sectonia "]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In 2004, which person(s) created &quot;Roblox&quot;?",
                "correct_answer" => "David Baszucki and Erik Cassel",
                "incorrect_answers" => json_encode([
                    "Erik Cassel",
                    "Jonas Alto and Sarah Smith",
                    "James Kolein",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "What is the name of the alien species introduced in Shadow the Hedgehog (2005)?",
                "correct_answer" => "Black Arms",
                "incorrect_answers" => json_encode(["The Swarm", "Black Hive", "The Eclipse"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "Which weapon that was cut from the game &quot;Half Life 2&quot; was going to replace the crowbar?",
                "correct_answer" => "Ice Axe",
                "incorrect_answers" => json_encode(["Fire Axe", "Wrench", "Hunting Knife"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "What is the most expensive weapon in Counter-Strike: Global Offensive?",
                "correct_answer" => "Scar-20/G3SG1",
                "incorrect_answers" => json_encode(["M4A1", "AWP", "R8 Revolver"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In the game Enter the Gungeon, which one of these is not a playable character?",
                "correct_answer" => "The Wizard",
                "incorrect_answers" => json_encode(["The Bullet", "The Robot", "The Cultist"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "Why was the character Trevor Philips discharged from the Air Force?",
                "correct_answer" => "Mental Health Issues",
                "incorrect_answers" => json_encode(["Injuries", "Disease", "Danger to Others"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In &quot;Call Of Duty: Zombies&quot;, completing which map&#039;s main easter egg will reward you with the achievement, &quot;Little Lost Girl&quot;?",
                "correct_answer" => "Origins",
                "incorrect_answers" => json_encode(["Revelations", "Moon", "Tranzit"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "What is the name of Joel&#039;s daughter in the game, &quot;The Last of Us&quot;? ",
                "correct_answer" => "Sarah",
                "incorrect_answers" => json_encode(["Ellie", "Tess", "Marlene"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "The name of the main character of the video game &quot;The Legend of Zelda&quot;, is Zelda.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In the Half-Life universe, the Black Mesa Research Facility is located in which US state?",
                "correct_answer" => "New Mexico",
                "incorrect_answers" => json_encode(["Nevada", "Arizona", "Wyoming"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "The first &quot;Metal Gear&quot; game was released for the PlayStation 1.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In the Gamecube Version of &quot;Resident Evil&quot; what text document is open on the monitor of the computer in the Visual Data Room?",
                "correct_answer" => "A GDC Document",
                "incorrect_answers" => json_encode([
                    "Text Document on Herbs",
                    "Nothing",
                    "Document on B.O.Ws",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "Which one of these games wasn&#039;t released in 2016?",
                "correct_answer" => "Metal Gear Solid V",
                "incorrect_answers" => json_encode([
                    "Tom Clancy&#039;s The Division",
                    "Killing Floor 2",
                    "Hitman",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "In the Fallout series, on which date did The Great War happen?",
                "correct_answer" => "October 23rd, 2077",
                "incorrect_answers" => json_encode([
                    "May 15th, 2058",
                    "December 14th, 2069",
                    "November 5th, 2076",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Video Games",
                "question" =>
                    "The game &quot;Jetpack Joyride&quot; was created by &quot;Redbrick Studios&quot;.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Which Formula One driver was nicknamed &#039;The Professor&#039;?",
                "correct_answer" => "Alain Prost",
                "incorrect_answers" => json_encode([
                    "Ayrton Senna",
                    "Niki Lauda",
                    "Emerson Fittipaldi",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Which of these Russian cities did NOT contain a stadium that was used in the 2018 FIFA World Cup?",
                "correct_answer" => "Vladivostok",
                "incorrect_answers" => json_encode([
                    "Rostov-on-Don",
                    "Yekaterinburg",
                    "Kaliningrad",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "Which country hosted the 2018 FIFA World Cup?",
                "correct_answer" => "Russia",
                "incorrect_answers" => json_encode(["Germany", "United States", "Saudi Arabia"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "The F1 season of 1994 is remembered for what tragic event?",
                "correct_answer" => "Death of Ayrton Senna (San Marino)",
                "incorrect_answers" => json_encode([
                    "The Showdown (Australia)",
                    "Verstappen on Fire (Germany)",
                    "Schumacher&#039;s Ban (Britain)",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "Who won the UEFA Champions League in 2016?",
                "correct_answer" => "Real Madrid C.F.",
                "incorrect_answers" => json_encode([
                    "FC Bayern Munich",
                    "Atletico Madrid",
                    "Manchester City F.C.",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "There are a total of 20 races in Formula One 2016 season.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "The Los Angeles Dodgers were originally from what U.S. city?",
                "correct_answer" => "Brooklyn",
                "incorrect_answers" => json_encode(["Las Vegas", "Boston", "Seattle"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "What is the nickname of Northampton town&#039;s rugby union club?",
                "correct_answer" => "Saints",
                "incorrect_answers" => json_encode(["Harlequins", "Saracens", "Wasps"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Who won the 2017 Formula One World Drivers&#039; Championship?",
                "correct_answer" => "Lewis Hamilton",
                "incorrect_answers" => json_encode([
                    "Sebastian Vettel",
                    "Nico Rosberg",
                    "Max Verstappen",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "ATP tennis hosted several tournaments on carpet court before being replaced to reduce injuries.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "How many scoring zones are there on a conventional dart board?",
                "correct_answer" => "82",
                "incorrect_answers" => json_encode(["62", "42", "102"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "In the 2014 FIFA World Cup, what was the final score in the match Brazil - Germany?",
                "correct_answer" => "1-7",
                "incorrect_answers" => json_encode(["1-5", "1-6", "2-6"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Peyton Manning retired after winning Super Bowl XLIX.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "With which team did Michael Schumacher make his Formula One debut at the 1991 Belgian Grand Prix?",
                "correct_answer" => "Jordan",
                "incorrect_answers" => json_encode(["Benetton", "Ferrari", "Mercedes"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "Which team was the 2015-2016 NBA Champions?",
                "correct_answer" => "Cleveland Cavaliers",
                "incorrect_answers" => json_encode([
                    "Golden State Warriors",
                    "Toronto Raptors",
                    "Oklahoma City Thunders",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "What team did England beat to win in the 1966 World Cup final?",
                "correct_answer" => "West Germany",
                "incorrect_answers" => json_encode(["Soviet Union", "Portugal", "Brazil"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "What team won the 2016 MLS Cup?",
                "correct_answer" => "Seattle Sounders",
                "incorrect_answers" => json_encode([
                    "Colorado Rapids",
                    "Toronto FC",
                    "Montreal Impact",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Which city features all of their professional sports teams&#039; jersey&#039;s with the same color scheme?",
                "correct_answer" => "Pittsburgh",
                "incorrect_answers" => json_encode(["New York", "Seattle", "Tampa Bay"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "Which country hosted the 2020 Summer Olympics?",
                "correct_answer" => "Japan",
                "incorrect_answers" => json_encode(["China", "Australia", "Germany"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "In association football, or soccer, a corner kick is when the game restarts after someone scores a goal.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Which basketball team has attended the most NBA grand finals?",
                "correct_answer" => "Los Angeles Lakers",
                "incorrect_answers" => json_encode([
                    "Boston Celtics",
                    "Philadelphia 76ers",
                    "Golden State Warriors",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "What year was hockey legend Wayne Gretzky born?",
                "correct_answer" => "1961",
                "incorrect_answers" => json_encode(["1965", "1959", "1963"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Which English football club has the nickname &#039;The Foxes&#039;?",
                "correct_answer" => "Leicester City",
                "incorrect_answers" => json_encode([
                    "Northampton Town",
                    "Bradford City",
                    "West Bromwich Albion",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "When was the first official international game played?",
                "correct_answer" => "1872",
                "incorrect_answers" => json_encode(["1880", "1863", "1865"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "The Olympics tennis court is a giant green screen.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "The Mazda 787B won the 24 Hours of Le Mans in what year?",
                "correct_answer" => "1991",
                "incorrect_answers" => json_encode(["1990", "2000", "1987"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "In golf, what name is given to a hole score of two under par?",
                "correct_answer" => "Eagle",
                "incorrect_answers" => json_encode(["Birdie", "Bogey", "Albatross"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Which sport is NOT traditionally played during the Mongolian Naadam festival?",
                "correct_answer" => "American Football",
                "incorrect_answers" => json_encode(["Wrestling", "Archery", "Horse-Racing"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Who won the 2016 Formula 1 World Driver&#039;s Championship?",
                "correct_answer" => "Nico Rosberg",
                "incorrect_answers" => json_encode([
                    "Lewis Hamilton",
                    "Max Verstappen",
                    "Kimi Raikkonen",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Which car manufacturer won the 2016 24 Hours of Le Mans?",
                "correct_answer" => "Porsche",
                "incorrect_answers" => json_encode(["Toyota", "Audi", "Ferrari"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "In 2008, Usain Bolt set the world record for the 100 meters with one shoelace untied.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "Where was the Games of the XXII Olympiad held?",
                "correct_answer" => "Moscow",
                "incorrect_answers" => json_encode(["Barcelona", "Tokyo", "Los Angeles"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "What is Tiger Woods&#039; all-time best career golf-score?",
                "correct_answer" => "61",
                "incorrect_answers" => json_encode(["65", "63", "67"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "What is the name of Manchester United&#039;s home stadium?",
                "correct_answer" => "Old Trafford",
                "incorrect_answers" => json_encode([
                    "Anfield",
                    "City of Manchester Stadium",
                    "St James Park",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "Which player holds the NHL record of 2,857 points?",
                "correct_answer" => "Wayne Gretzky",
                "incorrect_answers" => json_encode([
                    "Mario Lemieux ",
                    "Sidney Crosby",
                    "Gordie Howe",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "How many times did Martina Navratilova win the Wimbledon Singles Championship?",
                "correct_answer" => "Nine",
                "incorrect_answers" => json_encode(["Ten", "Seven", "Eight"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Formula E is an auto racing series that uses hybrid electric race cars.",
                "correct_answer" => "False",
                "incorrect_answers" => json_encode(["True"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Which Formula 1 driver switched teams in the middle of the 2017 season?",
                "correct_answer" => "Carlos Sainz Jr.",
                "incorrect_answers" => json_encode([
                    "Daniil Kvyat",
                    "Jolyon Palmer",
                    "Rio Haryanto",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Wilt Chamberlain scored his infamous 100-point-game against the New York Knicks in 1962.",
                "correct_answer" => "True",
                "incorrect_answers" => json_encode(["False"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Which portuguese island is soccer player Cristiano Ronaldo from?",
                "correct_answer" => "Madeira",
                "incorrect_answers" => json_encode(["Terceira", "Santa Maria", "Porto Santo"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "Who won the 2015 Formula 1 World Championship?",
                "correct_answer" => "Lewis Hamilton",
                "incorrect_answers" => json_encode([
                    "Nico Rosberg",
                    "Sebastian Vettel",
                    "Jenson Button",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "What is the most common type of pitch thrown by pitchers in baseball?",
                "correct_answer" => "Fastball",
                "incorrect_answers" => json_encode(["Slowball", "Screwball", "Palmball"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "Which nation hosted the FIFA World Cup in 2006?",
                "correct_answer" => "Germany",
                "incorrect_answers" => json_encode(["United Kingdom", "Brazil", "South Africa"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Which boxer was banned for taking a bite out of Evander Holyfield&#039;s ear in 1997?",
                "correct_answer" => "Mike Tyson",
                "incorrect_answers" => json_encode([
                    "Roy Jones Jr.",
                    "Evander Holyfield",
                    "Lennox Lewis",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "In bowling, what is the term used for getting three consecutive strikes?",
                "correct_answer" => "Turkey",
                "incorrect_answers" => json_encode(["Flamingo", "Birdie", "Eagle"]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "Who won the UEFA Champions League in 2017?",
                "correct_answer" => "Real Madrid C.F.",
                "incorrect_answers" => json_encode([
                    "Atletico Madrid",
                    "AS Monaco FC",
                    "Juventus F.C.",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" =>
                    "Which male player won the gold medal of table tennis singles in 2016 Olympics Games?",
                "correct_answer" => "Ma Long (China)",
                "incorrect_answers" => json_encode([
                    "Zhang Jike (China)",
                    "Jun Mizutani (Japan)",
                    "Vladimir Samsonov (Belarus)",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "Josh Mansour is part of what NRL team?",
                "correct_answer" => "Penrith Panthers",
                "incorrect_answers" => json_encode([
                    "Melbourne Storm",
                    "Sydney Roosters",
                    "North Queensland Cowboys",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "What is the oldest team in the NFL?",
                "correct_answer" => "Arizona Cardinals",
                "incorrect_answers" => json_encode([
                    "Chicago Bears",
                    "Green Bay Packers",
                    "New York Giants",
                ]),
            ],
            [
                "owner_id" => 1,

                "category" => "Sports",
                "question" => "Who won the 2018 Monaco Grand Prix?",
                "correct_answer" => "Daniel Ricciardo",
                "incorrect_answers" => json_encode([
                    "Sebastian Vettel",
                    "Kimi Raikkonen",
                    "Lewis Hamilton",
                ]),
            ]
        ))->create();



    }
}
