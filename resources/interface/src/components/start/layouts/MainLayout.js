import * as React from "react";
import NavBar from "./fragments/NavBar";

class MainLayout extends React.Component{
    render() {
        return (
            <div>
                <div className='pt-2 p-1'>
                    <NavBar/>
                </div>
                <div className='pt-2 p-1'>
                    {this.props.children}
                </div>
            </div>
        );
    }
}
export default MainLayout;