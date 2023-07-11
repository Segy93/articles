import React, { useState } from 'react'
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';

const AddArticle = (props) => {
    const [newArticle, setNewArticle] =
        useState(
            {
                title:"",
                body: "",
                image: "",
                link: ""
            }
        );

    const handleInput = (key, e) => {
        /*Duplicating and updating the state */
        const newState = Object.assign({}, newArticle);
        newState[key] = e.target.value;
        setNewArticle(newState);
    };
    const handleSubmit = (e) => {
        //preventDefault prevents page reload
        e.preventDefault();
        /* A call back to the onAdd props. The current
         * state is passed as a param
         */
        props.onAdd(newArticle);
    };
    const divStyle = {
        /*Code omitted for brevity */
    }
    return(
        /* when Submit button is pressed, the control is passed to
         * handleSubmit method
         */
        <div>
            <h2> Add new article </h2>
            <div style={divStyle}>
                <Form onSubmit={handleSubmit}>
                    <Form.Group className="mb-3" controlId="form.ControlInputTitle">
                        <Form.Label>Title</Form.Label>
                        <Form.Control type="text" onChange={(e)=>handleInput('title',e)} placeholder="Title" />
                    </Form.Group>
                    <Form.Group className="mb-3" controlId="form.ControlTextarea">
                        <Form.Label>Body</Form.Label>
                        <Form.Control as="textarea" rows={3} onChange={(e)=>handleInput('body',e)} placeholder="Body" />
                    </Form.Group>
                    <Form.Group className="mb-3" controlId="form.ControlInputImage">
                        <Form.Label>Image</Form.Label>
                        <Form.Control type="text" onChange={(e)=>handleInput('image',e)} placeholder="Image" />
                    </Form.Group>
                    <Form.Group className="mb-3" controlId="exampleForm.ControlInputLink">
                        <Form.Label>Link</Form.Label>
                        <Form.Control type="text" onChange={(e)=>handleInput('link',e)} placeholder="Link" />
                    </Form.Group>
                    <Button variant="primary" type= "submit">Create</Button>{' '}
                </Form>
            </div>
        </div>
    )
}

export default AddArticle
