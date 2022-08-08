import './MyComponents.css';

export function Input(props={}) {
    return (
        <>
            <label className="cpt-input-label" htmlFor={props.id}>{props.label}</label>
            <input className="cpt-input-input" type={props.type} placeholder={props.placeholder} id={props.id}/>
        </>
    );
}

export function GlassCard(props={}) {
    return (
        <div className="cpt-glass-card">
            {props.children}
        </div>
    );
}

export function Button(props={}) {
    return (
        <button className="cpt-button" onClick={props.onClick}>{props.children}</button>
    );
}
