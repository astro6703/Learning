import React from "react";
import { AppBar, Tabs, Tab, Box, Typography, TextField, Button } from "@material-ui/core";

import './Login.css';

interface ITabPanelProps {
  readonly index: number;
  readonly currentTabIndex: number;
  readonly children?: any;
}

interface ITabPanelState {
  readonly currentTabIndex: number;
  readonly children: any;
}

class TabPanel extends React.Component<ITabPanelProps, ITabPanelState> {
  readonly state: ITabPanelState;
  readonly index: number;

  constructor(props: ITabPanelProps) {
    super(props);
    this.state = {
      currentTabIndex: props.currentTabIndex,
      children: props.children
    };
    this.index = props.index;
  }

  componentWillReceiveProps(nextProps: ITabPanelProps) {
    this.setState({ currentTabIndex: nextProps.currentTabIndex });
  }

  render() {
    return (
      <div
        role="tabpanel"
        hidden={this.state.currentTabIndex !== this.index}
        id={`tabpanel-${this.index}`}
      >
        {this.index === this.state.currentTabIndex && (
          <Box p={2}>
            {this.state.children}
          </Box>
        )}
      </div>
    );
  }
}

interface ILoginState {
  readonly value: number;
  readonly username: string;
  readonly password: string;
  readonly isUsernameValid: boolean;
  readonly isPasswordValid: boolean;
}

export class Login extends React.Component {
  readonly state: ILoginState;
  
  constructor(props: any) {
    super(props);
    this.state = {
      value: 0,
      username: '',
      password: '',
      isUsernameValid: true,
      isPasswordValid: true
    }
  }

  private handleTabChange = (e: any, newValue: number) => {
    this.setState({ value: newValue });
  }

  private handleUsernameChange = (event: any) => {
    this.setState({ username: event.target.value });
  }

  private handlePasswordChange = (event: any) => {
    this.setState({ password: event.target.value });
  }

  private handleSubmit = (event: any) => {
    event.preventDefault();

    const isUsernameValid = this.state.username !== '';
    const isPasswordValid = this.state.password !== '';

    this.setState({
      isUsernameValid: isUsernameValid,
      isPasswordValid: isPasswordValid
    });

    if (isUsernameValid && isPasswordValid) {
      window.location.href = '/';
    }
  }

  render() {
    return (
      <div>
        <div className="form-container">
          <form action="dummy" method="POST">
            <p>Please, input your username and password.</p>
            <TextField label="Username" fullWidth onChange={this.handleUsernameChange}></TextField>
            <TextField label="Password" fullWidth type="password" onChange={this.handlePasswordChange}></TextField>
            <Button variant="contained" color="primary" type="submit">Submit</Button>
          </form>
        </div>
      </div>
    );
  }
}