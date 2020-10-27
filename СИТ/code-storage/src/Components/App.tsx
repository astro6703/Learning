import React from 'react';
import { NavLink, Switch, Route, withRouter } from 'react-router-dom';
import { List, ListItem, ListItemText, AppBar, Toolbar, IconButton, Typography, Button, Drawer, Link } from '@material-ui/core';
import MenuIcon from '@material-ui/icons/Menu';

import './App.css';
import './Nav.css';
import { Login } from './Login';
import { Home } from './Home';
import { Authors } from './Authors';
import { Snippets } from './Snippets';

interface IAppState {
  readonly isDrawerOpened: boolean;
}

interface INavLinkDescriptor {
  url: string;
  title: string;
}

class App extends React.Component<any, IAppState> {
  public readonly state: IAppState;
  private readonly navLinks: INavLinkDescriptor[];

  constructor(props: any) {
    super(props);
    this.state = {
        isDrawerOpened: false,
    };

    this.navLinks = [
      { url: '/home', title: 'Home'},
      { url: '/authors', title: 'Authors'}
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
              {this.navLinks.map((link, index) => (
                <Typography key={index} variant="h6" className="nav-link">
                  <NavLink to={link.url}>{link.title}</NavLink>
                </Typography>
              ))}
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
              {this.navLinks.map((link, index) => (
                <ListItem button key={index}>
                  <ListItemText>
                    <NavLink to={link.url} className="drawer-link">{link.title}</NavLink>
                  </ListItemText>
                </ListItem>
              ))}
            </List>
          </div>
        </Drawer>

        <div className="main-content-wrapper">
          <Switch>
            <Route path="/login" component={Login} />
            <Route path='/home' component={Home} />
            <Route path="/authors/:id" component={Authors} />
            <Route path="/authors" component={Authors} />
            <Route path="/snippets/:id" component={Snippets} />
            <Route path='/' component={Home} />
          </Switch>
        </div>
      </div>
    )
  }
}

export default withRouter(App)