import  React from 'react';
import {createBrowserHistory} from 'history';
import {Route, Router} from "react-router-dom";

import {StartContainer, ReportContainer} from "./start";
import MainLayout from "./start/layouts/MainLayout";


class MainContainer extends React.Component{
    render() {
        return(
            <Router history={createBrowserHistory()}>
            <div className="container">
                <div className="header">
                    <MainLayout>
                        <Route path='/' component={StartContainer} exact/>
                        <Route path='/reports' component={ReportContainer} exact/>
                    </MainLayout>
                </div>
            </div>
            </Router>
        )
    }
}
export default MainContainer;