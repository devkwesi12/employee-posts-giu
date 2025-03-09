import React from 'react'
import { Link, Outlet } from 'react-router-dom'

function Layout() {
  return (
    <>
    <header>
        <nav>
            <Link to="/" className='nav-link'>Home</Link>

            <div className=''>
            <Link to="/register" className='nav-link'>Register</Link>
            <Link to="/login" className='nav-link'>Login</Link>
            </div>
        </nav>
    </header>
    <main>
        <Outlet/>
    </main>
    </>
  )
}

export default Layout