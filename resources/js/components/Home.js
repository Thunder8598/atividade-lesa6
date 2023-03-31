import {Navigate} from "react-router-dom";

export default function Home() {
    const data = JSON.parse(localStorage.getItem("userdata") ?? "{}");

    if (!data?.token)
        return <Navigate to="/spa/login"/>;

    return <p>Olá {data?.name}</p>;
}
