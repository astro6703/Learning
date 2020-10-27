import React from "react";
import { Grid, Typography, Paper, Link } from "@material-ui/core";

import "./Home.css";

interface IOwner {
  id: number;
  name: string;
}

interface ISnippet {
  id: number;
  title: string;
  owner: IOwner;
  code: string;
  language: string;
}

interface IState {
  snippets: ISnippet[];
}

export class Home extends React.Component {
  state: IState;

  constructor(props: any) {
    super(props);
    this.state = {
      snippets: [] as Array<ISnippet>
    }
  }

  async componentDidMount() {
    fetch('http://localhost:3004/snippets')
    .then(response => response.json())
    .then(snippets => this.setState({
      snippets: snippets
    }));
  }

  public render() {
    return (
      <div className="grid-wrapper">
        <Grid container spacing={2}>
          <Grid item xs={12}>
            <Grid container justify="center" spacing={2}>
              {this.state.snippets.map((snippet, index) => (
                <Grid key={index} item >
                  <Paper className="paper">
                    <Typography variant="h6" color="primary">
                      {snippet.title}
                    </Typography>
                    <Typography variant="subtitle2">
                    <Link href={`/authors/${snippet.owner.id}`}>{snippet.owner.name}</Link>:
                    </Typography>
                    <Typography variant="subtitle2">
                      Language: {snippet.language}
                    </Typography>
                    <Typography>
                      {snippet.code.length > 30 ? snippet.code.slice(0, 30) : snippet.code}
                    </Typography>
                  </Paper>
                </Grid>
              ))}
            </Grid>
          </Grid>
        </Grid>
      </div>
    );
  }
}