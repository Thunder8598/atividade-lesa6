import {useState} from "react";
import {Navigate} from "react-router-dom";

export default function Login() {
    const [redirectToHome, setRedirectToHome] = useState(false);

    const onSubmit = async (evt) => {
        evt.preventDefault();

        const formData = new FormData(evt.currentTarget);

        try {
            const {data} = await axios.post("/api/auth", formData);

            localStorage.setItem("userdata", JSON.stringify(data));
            setRedirectToHome(true);
        } catch (e) {
            console.error(e);
        }
    }

    if (redirectToHome)
        return <Navigate to="/spa"/>

    return (
        <form onSubmit={onSubmit}>
            <div>
                <label>Email:</label>
                <input type="email" name="email" id="email" required/>
            </div>

            <div>
                <label>Password:</label>
                <input type="password" name="password" id="password" required/>
            </div>

            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    );
}
