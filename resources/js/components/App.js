import {BrowserRouter, Route, Routes} from "react-router-dom";
import Login from "./Login";
import Home from "./Home";
import ReactDOM from "react-dom";

export default function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/spa" element={<Home/>}/>
                <Route path="/spa/login" element={<Login/>}/>
            </Routes>
        </BrowserRouter>
    );
}

ReactDOM.render(<App/>, document.getElementById("root"));
