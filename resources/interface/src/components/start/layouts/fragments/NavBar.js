import * as React from "react";
import {Link, NavLink, Route} from "react-router-dom";
import {connect} from "react-redux";
import {faLock} from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";

class NavBar extends React.Component{
    render() {
        return (
            <div>
                <nav className='navbar navbar-light shadow-sm bg-light navbar-expand-sm'>
                    <Route path='/grading' render={()=>(
                        <>
                            <Link to="/grading/" className='navbar-brand'>
                                Ip Manager
                            </Link>
                            <ul className='navbar-nav ml-auto nav-pills'>
                                <li className='nav-item mx-1'>
                                    <NavLink className='btn  btn-outline-secondary' to="/grading/history" >
                                        History
                                    </NavLink>
                                </li>
                            </ul>
                        </>
                    )}/>
                    <Route path='/attendance' render={()=>(
                        <>
                            <Link to="/attendance/" className='navbar-brand'>
                                Attendance Manager
                            </Link>
                        </>
                    )}/>

                </nav>
            </div>
        );
    }
}
export default NavBar;