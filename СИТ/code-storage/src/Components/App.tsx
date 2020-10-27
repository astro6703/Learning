import React from 'react';
import { BrowserRouter as Router, NavLink, Switch, Route } from 'react-router-dom';
import { List, ListItem, ListItemText, AppBar, Toolbar, IconButton, Typography, Button, Drawer, Link } from '@material-ui/core';
import MenuIcon from '@material-ui/icons/Menu';

import './App.css';
import './Nav.css';
import { Login } from './Login';
import { Home } from './Home';

interface IAppState {
  readonly isDrawerOpened: boolean;
}

interface INavLinkDescriptor {
  url: string;
  title: string;
}

export class App extends React.Component<any, IAppState> {
  public readonly state: IAppState;
  private readonly navLinks: INavLinkDescriptor[];

  constructor(props: any) {
    super(props);
    this.state = {
        isDrawerOpened: false,
    };

    this.navLinks = [
      { url: '/', title: 'Home'},
      { url: '/about', title: 'About'},
      { url: '/elsewhere', title: 'Elsewhere' }
    ]
  }

  private toggleDrawer = (isOpened: boolean, event: any) => {
    if (event.type === 'keydown' && (event.key === 'Tab' || event.key === 'Shift')) {
      return;
    }

    this.setState({ isDrawerOpened: isOpened });
  };
  
  render() {
    return (
      <div>
        <AppBar position="static">
          <Toolbar>

            <IconButton onClick={(e) => this.toggleDrawer(true, e)} id='menu-opener' edge='start' className="menuButton" color="inherit" aria-label="menu">
              <MenuIcon />
            </IconButton>

            <Typography variant="h6" className="title">
              Code Storage
            </Typography>

            <nav id="navbar-main">
              <Router>
                {this.navLinks.map((link, index) => (
                  <Typography key={index} variant="h6" className="nav-link">
                    <NavLink to={link.url}>{link.title}</NavLink>
                  </Typography>
                ))}
              </Router>
            </nav>

            <Typography className="login">
              <Button color="inherit" variant="contained">
                <Link href="/login">Login</Link>
              </Button>
            </Typography>
          </Toolbar>
        </AppBar>

        <Drawer anchor="left" open={this.state.isDrawerOpened} onClose={(e) => this.toggleDrawer(false, e)}>
          <div
            className="list"
            role="presentation"
            onClick={(e) => this.toggleDrawer(false, e)}
            onKeyDown={(e) => this.toggleDrawer(false, e)}
          >
            <List>
              <Router>
                {this.navLinks.map((link, index) => (
                  <ListItem button key={index}>
                    <ListItemText>
                      <NavLink to={link.url} className="drawer-link">{link.title}</NavLink>
                    </ListItemText>
                  </ListItem>
                ))}
              </Router>
            </List>
          </div>
        </Drawer>

        <div className="main-content-wrapper">
          <Router>
            <Switch>
              <Route path="/login">
                <Login />
              </Route>
              <Route path='/'>
                <Home />
              </Route>
            </Switch>
          </Router>
        </div>
      </div>
    )
  }
}
