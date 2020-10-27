import React from "react";
import { TextField, Button, MenuItem, Select } from "@material-ui/core";

import "./Snippets.css"

interface IState {
    selectedSnippetId: number;
    selectedSnippet: ISnippet | undefined;
    allAuthors: IAuthor[];
}

interface IOwner {
    id: number;
    name: string;
}

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

export class Snippets extends React.Component {
    state: IState;

    constructor(props: any) {
        super(props);
        this.state = {
            selectedSnippetId: props.match.params.id ?? undefined,
            selectedSnippet: undefined,
            allAuthors: []
        };
    }

    async componentDidMount() {
        const snippetsResponse = await fetch(`http://localhost:3004/snippets/${this.state.selectedSnippetId}`);
        const snippet = await snippetsResponse.json();

        const authorsResponse = await fetch('http://localhost:3004/authors');
        const authors = await authorsResponse.json();

        this.setState({
            selectedSnippet: snippet,
            allAuthors: authors
        });
    }

    private handleAuthorChange(e: any) {
        this.setState((prevState: IState) => ({ 
            selectedSnippet: {
                ...prevState.selectedSnippet,
                owner: {
                    id: e.target.value,
                    name: e.target.name
                }
            }
        }))
    }

    private handleTitleChange(e: any) {
        this.setState((prevState: IState) => ({ 
            selectedSnippet: {
                ...prevState.selectedSnippet,
                title: e.target.value
            }
        }))
    }

    private handleCodeChange(e: any) {
        this.setState((prevState: IState) => ({ 
            selectedSnippet: {
                ...prevState.selectedSnippet,
                code: e.target.value
            }
        }))
    }

    private handleLanguageChange(e: any) {
        this.setState((prevState: IState) => ({
            selectedSnippet: {
                ...prevState.selectedSnippet,
                language: e.target.value
            }
        }))
    }

    private handleSave(e: any) {
        fetch(`http://localhost:3004/snippets`, {
            method: 'PUT',
            body: JSON.stringify(this.state.selectedSnippet)
        });
        window.location.href = '/';
    }

    render() {
        return (
            <div className="form-container">
                <form action="" method="">
                    <div>
                        <p>Select author</p>
                        <Select value={this.state.selectedSnippet?.owner.id} onChange={this.handleAuthorChange.bind(this)}>
                            {this.state.allAuthors.map((author, index) => (
                                <MenuItem value={author.id}>{author.username}</MenuItem>
                            ))}
                        </Select>
                    </div>
                    <div>
                        <p>Title:</p>
                        <TextField fullWidth value={this.state.selectedSnippet?.title} onChange={this.handleTitleChange.bind(this)}></TextField>
                    </div>
                    <div>
                        <p>Code:</p>
                        <TextField multiline fullWidth value={this.state.selectedSnippet?.code} onChange={this.handleCodeChange.bind(this)}></TextField>
                    </div>
                    <div>
                        <p>Select language</p>
                        <Select value={this.state.selectedSnippet?.language} onChange={this.handleLanguageChange.bind(this)}>
                            <MenuItem value={1}>JS</MenuItem>
                            <MenuItem value={2}>C</MenuItem>
                            <MenuItem value={3}>C++</MenuItem>
                            <MenuItem value={4}>Java</MenuItem>
                        </Select>
                    </div>
                    
                    <Button variant="contained" color="primary" type="button" onClick={this.handleSave.bind(this)}>Save</Button>
                </form>
            </div>
        )
    }
}