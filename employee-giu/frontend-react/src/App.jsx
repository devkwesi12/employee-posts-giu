import { useState } from 'react'
import { BrowserRouter,Route,Routes } from 'react-router-dom'
//import reactLogo from './assets/react.svg'
//import viteLogo from '/vite.svg'
import './App.css'
import Layout from './Pages/Layout'
import Home from './Pages/Home'
import Register from './Pages/Auth/Register'
import Login from './Pages/Auth/Login'

function App() {
 
return <BrowserRouter>
<Routes>

<Route path="/" element={<Layout/>}>
<Route index element={<Home/>}/>

<Route path="/register" element={<Register/>}/>
<Route path="/login" element={<Login/>}/>
</Route>

</Routes>

</BrowserRouter>
}

export default App
