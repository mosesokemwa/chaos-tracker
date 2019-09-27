import React from "react";
import "../../index.css"
import endpoint from "../../endpoint";
import 'bootstrap/dist/css/bootstrap.css';

class ReportContainer extends React.Component {
    state = {
        users: [],
        error: null,
        isLoading: true
    };

    fetchReportData() {
        fetch(endpoint.API_TASK_REPORT)
            .then(response => response.json())
            .then(data =>
                this.setState({
                    users: data,
                    isLoading: false
                })
            )
            .catch(error => this.setState({ error, isLoading: false }));
    }
    componentDidMount() {
        this.fetchReportData();
        this.timer = setInterval(() => this.fetchReportData(), 50000);
    }
    componentWillUnmount() {
        clearInterval(this.timer);
        this.timer = null;
    }
    render() {
        const { isLoading, error } = this.state;
        return (
            <React.Fragment>
                <div className="row">
                    <div className="col">
                        <h1>REPORT</h1>
                    </div>
                </div>

                <div className="row">
                    <div className="col">
                        {error ? <p>{error.message}</p> : null}
                        {!isLoading ? (
                            this.state.users.map(user => {
                                return (
                                    <div key={user.color} className={user.color}>
                                        <p>Current Time: {user.number.db}</p>
                                        <p>Servers Running: {user.number.server}</p>
                                        <hr />
                                    </div>
                                );
                            })
                        ) : (
                            <h3>Loading...</h3>
                        )}
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default ReportContainer;