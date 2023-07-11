import React, { useState, useEffect } from 'react'
import { createRoot } from 'react-dom/client'
import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import AddArticle from './AddArticle';

const Main = () => {
    const handleAddArticle = (article) => {
        /*Fetch API for post request */
        fetch('api/articles', {
            method:'post',
            /* headers are important*/
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json'
            },

            body: JSON.stringify(article)
        })
        .then(response => {
            return response.json();
        })
        .then( data => {
            //update the state of articles and currentArticle
            getArticles();
        })
    }
    const articles_per_row = 5;
    // Sets initial state for articles to empty array
    const [articles, setArticles] = useState();
    const [next, setNext] = useState(articles_per_row);
    // Call this function to get articles data
    const getArticles = () => {
        /* fetch API in action */
        fetch('/api/articles')
        .then(response => {
            return response.json();
        })
        .then(articles => {
            //Fetched article is stored in the state
            setArticles(articles);
        });
    };
    /* useEffect is a lifecycle hook
     * that gets called after the component is rendered
     */
    useEffect(() => {
        getArticles();
    }, []);

    const handleMoreArticles = () => {
        setNext(next + articles_per_row);
    };
    // Render the articles
    const renderArticles = () => {
        return articles?.slice(0, next)?.map(article => {
            return (
                /* When using list you need to specify a key
                 * attribute that is unique for each list item
                 */
                <li key = {article.id}>
                    <Card style={{ width: '18rem' }} >
                    <Card.Img variant="top" src={ article.image } />
                    <Card.Body>
                    <Card.Title>{ article.title }</Card.Title>
                    <Card.Text>
                        { article.body }
                    </Card.Text>
                    <Card.Link href = { article.link }>Link</Card.Link>
                    </Card.Body>
                </Card>
              </li>
            );
        })
    };
    return(
        <ul>
            { renderArticles() }
            {next < articles?.length && (
                <Button variant="primary" onClick={handleMoreArticles} >Load more</Button>
            )}
            <AddArticle onAdd={handleAddArticle} />
        </ul>
    )
}
if (document.getElementById('root')) {
    createRoot(document.getElementById('root')).render(<Main/>)
}

export default Main
