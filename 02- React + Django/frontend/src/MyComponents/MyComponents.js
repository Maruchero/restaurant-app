import styles from './MyComponents.module.css';

export function Input(props={}) {
    return (
        <div className={props.className}>
            <label className={styles["cpt-input-label"]} htmlFor={props.id}>{props.label}</label>
            <input className={styles["cpt-input-input"]} type={props.type} placeholder={props.placeholder} id={props.id}/>
        </div>
    );
}

export function GlassCard(props={}) {
    return (
        <div className={styles["cpt-glass-card"] + " " + props.className}>
            {props.children}
        </div>
    );
}

export function Button(props={}) {
    return (
        <button className={styles["cpt-button"] + " " + props.className} onClick={props.onClick}>{props.children}</button>
    );
}
