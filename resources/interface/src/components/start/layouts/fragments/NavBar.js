import * as React from "react";
import {Link, NavLink, Route} from "react-router-dom";

class NavBar extends React.Component{
    render() {
        return (
            <div>
                <nav className='navbar navbar-light shadow-sm bg-light navbar-expand-sm'>
                    <Route path='/logs' render={()=>(
                        <>
                            <Link to="/logs" className='navbar-brand'>
                                Logs Manager
                            </Link>
                            <ul className='navbar-nav ml-auto nav-pills'>
                                <li className='nav-item mx-1'>
                                    <NavLink className='btn  btn-outline-secondary' to="/logs" >
                                        Logs
                                    </NavLink>
                                    <NavLink className='btn  btn-outline-secondary' to="/reports" >
                                        Reports
                                    </NavLink>
                                </li>
                            </ul>
                        </>
                    )}/>
                    <Route path='/reports' render={()=>(
                        <>
                            <Link to="/reports" className='navbar-brand'>
                                Reports Manager
                            </Link>
                            <ul className='navbar-nav ml-auto nav-pills'>
                                <li className='nav-item mx-1'>
                                    <NavLink className='btn  btn-outline-secondary' to="/logs" >
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