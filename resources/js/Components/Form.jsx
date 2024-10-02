import { useEffect, useState } from "react";

/**
 * Generates a form for the user to input the parameters for the API request.
 * The form contains fields for the number of questions, category, difficulty, and
 * type of question. The form also contains a submit button to generate the API
 * URL based on the user's input.
 * @param {{onSubmit: (formData: {trivia_amount: number, trivia_category: string, trivia_difficulty: string, trivia_type: string}) => void}} props
 * @returns {JSX.Element}
 */
export default function Form({ onSubmit }) {
    const [categories, setCategories] = useState([]);
    const [formData, setFormData] = useState({
        trivia_amount: 10,
        trivia_category: "",
        trivia_difficulty: "",
        trivia_type: "",
    });
    useEffect(() => {
        fetch("/api_quiz/categories")
            .then((res) => res.json())
            .then((data) => {
                setCategories(data);
            });
    }, []);

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        onSubmit(formData);
    };

    return (
        <form onSubmit={handleSubmit} className="bg-gradient-to-l from-blue-900 to-indigo-800 p-6 rounded-lg shadow-lg">
            <h2 className="text-2xl font-bold mb-4 text-slate-300">Configure Your Quiz</h2>
            
            <div className="mb-4">
                <label htmlFor="trivia_amount" className="block text-slate-300 font-semibold mb-2">Number of Questions:</label>
                <input
                    type="number"
                    name="trivia_amount"
                    id="trivia_amount"
                    className="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    min="1"
                    max="50"
                    onChange={handleChange}
                    value={formData.trivia_amount}
                />
            </div>

            <div className="mb-4">
                <label htmlFor="trivia_category" className="block text-slate-300 font-semibold mb-2">Select Category:</label>
                <select
                    name="trivia_category"
                    id="trivia_category"
                    className="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onChange={handleChange}
                    value={formData.trivia_category}
                >
                {categories ? (
                    categories.map((category) => {
                        return(
                            <option key={category.id} value={category.name}>
                                {category.name}
                            </option>
                        )
                    })
                ) : (
                    null
                )}
            </select>
            </div>


            <button className="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out" type="submit">
                Generate Quiz
            </button>
        </form>
    );
}

Form.propTypes = {
    onSubmit: {
        formData: {
            trivia_amount: 10,
            trivia_category: "",
            trivia_difficulty: "",
            trivia_type: "",
        },
    },
};
