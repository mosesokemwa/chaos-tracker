import * as React from "react";
import {Link, NavLink, Route} from "react-router-dom";

class NavBar extends React.Component{
    render() {
        return (
            <div>
                <nav className='navbar navbar-light shadow-sm bg-light navbar-expand-sm'>
                    <Route path='/' render={()=>(
                        <>
                            <Link to="/" className='navbar-brand'>
                                Logs Manager
                            </Link>
                            <ul className='navbar-nav ml-auto nav-pills'>
                                <li className='nav-item mx-1'>
                                    <NavLink className='btn  btn-outline-secondary' to="/" >
                                        Logs
                                    </NavLink>
                                    <NavLink className='btn  btn-outline-secondary' to="/reports" >
                                        Reports
                                    </NavLink>
                                </li>
                            </ul>
                        </>
                    )}/>
                </nav>
            </div>
        );
    }
}
export default NavBar;