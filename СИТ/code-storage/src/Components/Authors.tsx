import React from "react";

import "./Authors.css";
import { Typography, Link } from "@material-ui/core";

interface IAuthor {
  id: number;
  username: string;
  snippets: number[];
}

interface ISnippet {
  id: number;
  title: string;
  owner: IOwner;
  code: string;
  language: string;
}

interface IOwner {
  id: number;
  name: string;
}

interface IState {
  authors: IAuthor[];
  selectedAuthorId: number | undefined;
  selectedAuthor: IAuthor | undefined;
  selectedAuthorSnippets: ISnippet[];
}

export class Authors extends React.Component {
  state: IState;


  constructor(props: any) {
    super(props);
    this.state = {
      authors: [] as Array<IAuthor>,
      selectedAuthorId: props.match.params.id ?? undefined,
      selectedAuthor: undefined,
      selectedAuthorSnippets: []
    };
  }

  componentDidMount() {
    if (this.state.selectedAuthorId) {
      this.getAuthorById(this.state.selectedAuthorId);
    } else {
      this.getAuthors();
    }
  }

  async getAuthors() {
    fetch('http://localhost:3004/authors')
      .then(response => response.json())
      .then(authors => this.setState({
        authors: authors
      }));
  }

  async getAuthorById(id: number) {
    const response = await fetch(`http://localhost:3004/authors/${id}`);
    const selectedAuthor = await response.json();
    
    const selectedAuthorSnippets = await Promise.all(selectedAuthor.snippets.map((s: number) => 
      fetch(`http://localhost:3004/snippets/${s}`)
        .then(response => response.json())));

    this.setState({
      selectedAuthor: selectedAuthor,
      selectedAuthorSnippets: selectedAuthorSnippets
    });
  }

  private renderAll() {
    return (
      <div className="table-wrapper">
        <table>
          <thead>
            <tr>
              <th><Typography variant="h6">Username:</Typography></th>
              <th><Typography variant="h6">Snippets:</Typography></th>
            </tr>
          </thead>
          <tbody>
            {this.state.authors.map((author, index) => (
              <tr key={index}>
                <td><Typography variant="subtitle1"><Link href={`/authors/${author.id}`}>{author.username}</Link></Typography></td>
                <td>
                  <Typography variant="subtitle1">
                    {author.snippets.map((snippet, index) => (
                      <Link key={index} href={`/snippets/${snippet}`}>{snippet} </Link>
                    ))}
                  </Typography>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    );
  }

  private renderSingleAuthor() {
    const snippets = this.state.selectedAuthorSnippets;
    return (
      <div className="portfolio-wrapper">
        <Typography variant="h4">Username: {this.state.selectedAuthor?.username}</Typography>
        <div>
          <Typography variant="h5">Snippets:</Typography>
          <ul>
            {snippets.map((snippet, index) => (
              <li key={index}>
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
                  {snippet.code}
                </Typography>
            </li>
            ))}
          </ul>
        </div>
      </div>
    );
  }

  public render() {
    return (this.state.selectedAuthorId ? this.renderSingleAuthor() : this.renderAll());
  }
}